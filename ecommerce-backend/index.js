const express = require('express');
const axios = require('axios');
const mysql = require('mysql2');
const multer = require('multer');
const fs = require('fs');
require('dotenv').config();

const app = express();
const port = 3000;

app.use(express.json());
app.use(express.static('public'));

const storage = multer.diskStorage({
    destination: function (req, file, cb) {
        cb(null, 'uploads/');
    },
    filename: function (req, file, cb) {
        cb(null, `${Date.now()}-${file.originalname}`);
    }
});

const upload = multer({ storage: storage });

const connection = mysql.createConnection({
    host: process.env.DB_HOST,
    user: process.env.DB_USER,
    password: process.env.DB_PASSWORD,
    database: process.env.DB_NAME
});

connection.connect((err) => {
    if (err) {
        console.error('Error connecting to the database:', err);
        return;
    }
    console.log('Connected to the MySQL server.');
});

const staticBaseKnowledge = `
Your name is “Wizard’s AI”, here’s some instructions:
1. Tone and Style:
   - Use a friendly and approachable tone throughout interactions with users.
   - Incorporate casual language that resonates with our target audience, which consists mainly of young adults interested in fashion.
   - Inject a touch of humor or wit when appropriate to keep interactions engaging and memorable.
   - Avoid overly formal or technical language unless necessary for clarity.

2. Brand Voice:
   - Reflect the brand's personality, which is trendy, stylish, and aspirational.
   - Emphasize the brand's commitment to inclusivity, diversity, and sustainability in the fashion industry.
   - Showcase our passion for fashion and creativity in every response.

3. Knowledge Base:
   - Utilize our extensive database of fashion products, including clothing, accessories, and footwear.
   - Provide accurate and detailed information about product descriptions, materials, sizing, availability, and pricing.
   - Offer personalized recommendations based on user preferences, browsing history, and past purchases.
   - Incorporate insights from fashion trends and industry news to keep users informed and inspired.

4. Customer Support:
   - Assist users with inquiries about orders, shipping, returns, and exchanges promptly and efficiently.
   - Empathize with users' concerns or issues and offer solutions or alternatives whenever possible.
   - Direct users to additional resources or contact channels for further assistance if needed.

5. Engagement and Interaction:
   - Initiate conversations with users proactively, such as greeting them upon entry or suggesting new arrivals or promotions.
   - Encourage user engagement through polls, quizzes, or challenges related to fashion preferences or styling choices.
   - Respond promptly to user queries or comments to maintain an active and responsive presence.

6. Feedback Collection:
   - Prompt users for feedback on their experience with the chatbot, including usability, helpfulness, and satisfaction.
   - Encourage users to share suggestions for improvement or features they would like to see implemented.
   - Use feedback to continuously iterate and optimize the chatbot's performance and user experience.

7. Privacy and Security:
   - Prioritize user privacy and data security by safeguarding sensitive information and adhering to relevant regulations.
   - Communicate transparently with users about data usage and ensure their consent for any data collection or processing activities.

8. Topic Limitation:
   - The AI assistant should focus solely on topics related to fashion, clothing, accessories, and our website.
   - Instruct the AI to politely decline or redirect questions that fall outside of these topics.

9. Professional Response:
   - When encountering questions unrelated to fashion or the website, the AI should respond professionally and courteously.
   - Avoid providing answers to off-topic questions to maintain clarity and consistency in the chatbot's purpose.

10. Redirecting Off-Topic Questions:
   - If a user asks a question outside the designated scope, politely inform them that the AI assistant specializes in fashion-related inquiries.
   - Offer alternative channels or resources where users can seek assistance for non-fashion-related queries.

11. Reinforcing Scope:
   - Remind users of the AI assistant's purpose and expertise in fashion and website-related matters.
   - Encourage users to explore fashion-related topics and engage with the AI within its designated area of expertise.

12. Handling Exceptions:
   - Provide guidelines for handling exceptional cases where users persistently ask off-topic questions or seek assistance beyond the AI's scope.
   - Offer predefined responses or escalation procedures to address such situations professionally and effectively.

13. Continuous Monitoring and Improvement:
   - Monitor interactions regularly to identify any instances of off-topic questions or user dissatisfaction.
   - Use feedback to refine the AI's responses and optimize its performance within the defined scope.

14. Product Recommendations:
   - When a user asks for a product recommendation, provide detailed information about the product, including a brief description, price, and availability.
   - Include a link to the product page in the response using the format: [Product Name](product-link).
   - Example prompts that should trigger a product recommendation response:
     - "Can you recommend a good [product category]?"
     - "What [product category] would you suggest?"
     - "I'm looking for a [product category]. Any suggestions?"
`;

async function getProductKnowledge() {
    return new Promise((resolve, reject) => {
        connection.query('SELECT product_name, description, price, stock, size, color, image FROM products', (error, results) => {
            if (error) {
                console.error('Database query error:', error);
                return reject(error);
            }

            let productKnowledge = 'Product Information:\n';
            results.forEach((product) => {
                const productLink = `http://localhost:3000/productpageurl?name=${encodeURIComponent(product.product_name)}`;
                productKnowledge += `- ${product.product_name}: ${product.description} Available sizes: ${product.size}, Colors: ${product.color}, Price: ${product.price}. Stock: ${product.stock}. [${product.product_name}](${productLink})\n`;
            });

            resolve(productKnowledge);
        });
    });
}

app.post('/chat', async (req, res) => {
    const userMessage = req.body.message;
    console.log('User message:', userMessage);

    try {
        const productKnowledge = await getProductKnowledge();
        console.log('Product knowledge:', productKnowledge);

        const response = await axios.post('https://api.openai.com/v1/chat/completions', {
            model: 'gpt-3.5-turbo',
            messages: [
                { role: 'system', content: staticBaseKnowledge },
                { role: 'system', content: productKnowledge },
                { role: 'user', content: userMessage }
            ],
            max_tokens: 300,
            temperature: 0.7,
        }, {
            headers: {
                'Authorization': `Bearer ${process.env.OPENAI_API_KEY}`
            }
        });

        let botMessage = response.data.choices[0].message.content.trim();
        console.log('Bot message:', botMessage);

        // Assuming that each product in the knowledge has a name, price, description, and image
        let products = [];
        const regex = /\[(.*?)\]\((.*?)\)/g;
        let match;
        while ((match = regex.exec(botMessage)) !== null) {
            const productName = match[1];
            const productLink = match[2];

            // Fetch product details from database
            const productQuery = new Promise((resolve, reject) => {
                connection.query('SELECT product_name, description, price, stock, size, color, image FROM products WHERE product_name = ?', [productName], (error, results) => {
                    if (error) {
                        return reject(error);
                    }

                    if (results.length > 0) {
                        const product = results[0];
                        resolve({
                            name: product.product_name,
                            description: product.description,
                            price: product.price,
                            image: product.image,
                            link: productLink
                        });
                    } else {
                        resolve(null);
                    }
                });
            });

            const productDetails = await productQuery;
            if (productDetails) {
                products.push(productDetails);
            }
        }

        res.json({ message: botMessage, products });
    } catch (error) {
        console.error('Error:', error.response ? error.response.data : error.message);
        res.status(500).json({ message: 'Error processing your request' });
    }
});

app.post('/voice-command', upload.single('audio'), async (req, res) => {
    const audioPath = req.file.path;

    try {
        const formData = new FormData();
        formData.append('model', 'whisper-1');
        formData.append('file', fs.createReadStream(audioPath));
        formData.append('response_format', 'json');

        const response = await axios.post('https://api.openai.com/v1/audio/transcriptions', formData, {
            headers: {
                'Authorization': `Bearer ${process.env.OPENAI_API_KEY}`,
                ...formData.getHeaders()
            }
        });

        const transcription = response.data.text;
        res.json({ transcription });
    } catch (error) {
        console.error('Error:', error.response ? error.response.data : error.message);
        res.status(500).json({ message: 'Error processing your request' });
    } finally {
        fs.unlink(audioPath, (err) => {
            if (err) {
                console.error('Failed to delete audio file:', err);
            }
        });
    }
});

// Endpoint untuk melayani halaman HTML tambahan
app.get('/productpageurl', (req, res) => {
    res.sendFile(__dirname + '/public/product-template.html');
});

// Endpoint untuk mengarahkan ke dashboard PHP
app.get('/Dashboard', (req, res) => {
    res.redirect('http://localhost/SEMESTER%204/FASHIONWIZARD/WebWizards/Dashboard/index.php');
});

app.get('/api/product', (req, res) => {
    const productName = req.query.name;
    connection.query('SELECT * FROM products WHERE product_name = ?', [productName], (error, results) => {
        if (error) {
            return res.status(500).json({ message: 'Error fetching product details' });
        }

        if (results.length > 0) {
            const product = results[0];
            res.json({
                name: product.product_name,
                description: product.description,
                price: product.price,
                stock: product.stock,
                size: product.size,
                color: product.color,
                image: product.image // Add image field
            });
        } else {
            res.status(404).json({ message: 'Product not found' });
        }
    });
});

// Endpoint untuk mendapatkan semua produk
app.get('/api/products', (req, res) => {
    connection.query('SELECT * FROM products', (error, results) => {
        if (error) {
            return res.status(500).json({ message: 'Error fetching products' });
        }

        res.json(results);
    });
});

app.listen(port, () => {
    console.log(`Server is running on http://localhost:${port}`);
});
