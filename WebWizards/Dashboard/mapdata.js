var simplemaps_countrymap_mapdata={
  main_settings: {
   //General settings
    width: "responsive", //'700' or 'responsive'
    background_color: "#FFFFFF",
    background_transparent: "yes",
    border_color: "#ffffff",
    
    //State defaults
    state_description: "#data#",
    state_color: "#88A4BC",
    state_hover_color: "#3B729F",
    state_url: "",
    border_size: 1.5,
    all_states_inactive: "no",
    all_states_zoomable: "yes",
    
    //Location defaults
    location_description: "Location description",
    location_url: "",
    location_color: "#FF0067",
    location_opacity: 0.8,
    location_hover_opacity: 1,
    location_size: 25,
    location_type: "square",
    location_image_source: "frog.png",
    location_border_color: "#FFFFFF",
    location_border: 2,
    location_hover_border: 2.5,
    all_locations_inactive: "no",
    all_locations_hidden: "no",
    
    //Label defaults
    label_color: "#ffffff",
    label_hover_color: "#ffffff",
    label_size: 16,
    label_font: "Arial",
    label_display: "auto",
    label_scale: "yes",
    hide_labels: "no",
    hide_eastern_labels: "no",
   
    //Zoom settings
    zoom: "yes",
    manual_zoom: "yes",
    back_image: "no",
    initial_back: "no",
    initial_zoom: "-1",
    initial_zoom_solo: "no",
    region_opacity: 1,
    region_hover_opacity: 0.6,
    zoom_out_incrementally: "yes",
    zoom_percentage: 0.99,
    zoom_time: 0.5,
    
    //Popup settings
    popup_color: "white",
    popup_opacity: 0.9,
    popup_shadow: 1,
    popup_corners: 5,
    popup_font: "12px/1.5 Verdana, Arial, Helvetica, sans-serif",
    popup_nocss: "no",
    
    //Advanced settings
    div: "map",
    auto_load: "yes",
    url_new_tab: "no",
    images_directory: "default",
    fade_time: 0.1,
    link_text: "View Website",
    popups: "detect",
    state_image_url: "",
    state_image_position: "",
    location_image_url: ""
  },
  state_specific: {
    IDAC: {
      color: "#c2cfff",
      name: "Aceh",
      description: "5"
    },
    IDBA: {
      color: "#c2cfff",
      name: "Bali",
      description: "2"
    },
    IDBB: {
      color: "#2957ff",
      name: "Bangka-Belitung",
      description: "66"
    },
    IDBE: {
      color: "#0035f5",
      name: "Bengkulu",
      description: "85"
    },
    IDBT: {
      color: "#c2cfff",
      name: "Banten",
      description: "12"
    },
    IDGO: {
      color: "#8fa7ff",
      name: "Gorontalo",
      description: "35"
    },
    IDJA: {
      color: "#c2cfff",
      name: "Jambi",
      description: "12"
    },
    IDJB: {
      color: "#0035f5",
      name: "Jawa Barat",
      description: "120"
    },
    IDJI: {
      color: "#0035f5",
      name: "Jawa Timur",
      description: "74"
    },
    IDJK: {
      color: "#5c7fff",
      name: "Jakarta Raya",
      description: "45"
    },
    IDJT: {
      color: "#2957ff",
      name: "Jawa Tengah",
      description: "66"
    },
    IDKB: {
      color: "#8fa7ff",
      name: "Kalimantan Barat",
      description: "20"
    },
    IDKI: {
      color: "#8fa7ff",
      name: "Kalimantan Timur",
      description: "16"
    },
    IDKR: {
      color: "#2957ff",
      name: "Kepulauan Riau",
      description: "53"
    },
    IDKS: {
      color: "#0035f5",
      name: "Kalimantan Selatan",
      description: "96"
    },
    IDKT: {
      color: "#5c7fff",
      name: "Kalimantan Tengah",
      description: "45"
    },
    IDKU: {
      color: "#8fa7ff",
      name: "North Kalimantan",
      description: "17"
    },
    IDLA: {
      color: "#2957ff",
      name: "Lampung",
      description: "54"
    },
    IDMA: {
      color: "#5c7fff",
      name: "Maluku",
      description: "52"
    },
    IDMU: {
      color: "#c2cfff",
      name: "Maluku Utara",
      description: "12"
    },
    IDNB: {
      color: "#8fa7ff",
      name: "Nusa Tenggara Barat",
      description: "35"
    },
    IDNT: {
      color: "#0035f5",
      name: "Nusa Tenggara Timur",
      description: "75"
    },
    IDPA: {
      color: "#c2cfff",
      name: "Papua",
      description: "15"
    },
    IDPB: {
      color: "#5c7fff",
      name: "Papua Barat",
      description: "42"
    },
    IDRI: {
      color: "#2957ff",
      name: "Riau",
      description: "65"
    },
    IDSA: {
      color: "#8fa7ff",
      name: "Sulawesi Utara",
      description: "32"
    },
    IDSB: {
      color: "#0035f5",
      name: "Sumatera Barat",
      description: "85"
    },
    IDSG: {
      color: "#5c7fff",
      name: "Sulawesi Tenggara",
      description: "45"
    },
    IDSN: {
      color: "#5c7fff",
      name: "Sulawesi Selatan",
      description: "42"
    },
    IDSR: {
      color: "#2957ff",
      name: "Sulawesi Barat",
      description: "65"
    },
    IDSS: {
      color: "#c2cfff",
      name: "Sumatera Selatan",
      description: "12"
    },
    IDST: {
      color: "#2957ff",
      name: "Sulawesi Tengah",
      description: "53"
    },
    IDSU: {
      color: "#0035f5",
      name: "Sumatera Utara",
      description: "78"
    },
    IDYO: {
      color: "#2957ff",
      name: "Yogyakarta",
      description: "54"
    }
  },
  locations: {},
  labels: {
    IDAC: {
      name: "Aceh",
      parent_id: "IDAC"
    },
    IDBA: {
      name: "Bali",
      parent_id: "IDBA"
    },
    IDBB: {
      name: "Bangka-Belitung",
      parent_id: "IDBB"
    },
    IDBE: {
      name: "Bengkulu",
      parent_id: "IDBE"
    },
    IDBT: {
      name: "Banten",
      parent_id: "IDBT"
    },
    IDGO: {
      name: "Gorontalo",
      parent_id: "IDGO"
    },
    IDJA: {
      name: "Jambi",
      parent_id: "IDJA"
    },
    IDJB: {
      name: "Jawa Barat",
      parent_id: "IDJB"
    },
    IDJI: {
      name: "Jawa Timur",
      parent_id: "IDJI"
    },
    IDJK: {
      name: "Jakarta Raya",
      parent_id: "IDJK"
    },
    IDJT: {
      name: "Jawa Tengah",
      parent_id: "IDJT"
    },
    IDKB: {
      name: "Kalimantan Barat",
      parent_id: "IDKB"
    },
    IDKI: {
      name: "Kalimantan Timur",
      parent_id: "IDKI"
    },
    IDKR: {
      name: "Kepulauan Riau",
      parent_id: "IDKR"
    },
    IDKS: {
      name: "Kalimantan Selatan",
      parent_id: "IDKS"
    },
    IDKT: {
      name: "Kalimantan Tengah",
      parent_id: "IDKT"
    },
    IDKU: {
      name: "North Kalimantan",
      parent_id: "IDKU"
    },
    IDLA: {
      name: "Lampung",
      parent_id: "IDLA"
    },
    IDMA: {
      name: "Maluku",
      parent_id: "IDMA"
    },
    IDMU: {
      name: "Maluku Utara",
      parent_id: "IDMU"
    },
    IDNB: {
      name: "Nusa Tenggara Barat",
      parent_id: "IDNB"
    },
    IDNT: {
      name: "Nusa Tenggara Timur",
      parent_id: "IDNT"
    },
    IDPA: {
      name: "Papua",
      parent_id: "IDPA"
    },
    IDPB: {
      name: "Papua Barat",
      parent_id: "IDPB"
    },
    IDRI: {
      name: "Riau",
      parent_id: "IDRI"
    },
    IDSA: {
      name: "Sulawesi Utara",
      parent_id: "IDSA"
    },
    IDSB: {
      name: "Sumatera Barat",
      parent_id: "IDSB"
    },
    IDSG: {
      name: "Sulawesi Tenggara",
      parent_id: "IDSG"
    },
    IDSN: {
      name: "Sulawesi Selatan",
      parent_id: "IDSN"
    },
    IDSR: {
      name: "Sulawesi Barat",
      parent_id: "IDSR"
    },
    IDSS: {
      name: "Sumatera Selatan",
      parent_id: "IDSS"
    },
    IDST: {
      name: "Sulawesi Tengah",
      parent_id: "IDST"
    },
    IDSU: {
      name: "Sumatera Utara",
      parent_id: "IDSU"
    },
    IDYO: {
      name: "Yogyakarta",
      parent_id: "IDYO"
    }
  },
  legend: {
    entries: []
  },
  regions: {},
  data: {
    data: {
      IDAC: "5",
      IDBA: "2",
      IDBB: "66",
      IDBE: "85",
      IDBT: "12",
      IDGO: "35",
      IDJA: "12",
      IDJB: "120",
      IDJI: "74",
      IDJK: "45",
      IDJT: "66",
      IDKB: "20",
      IDKI: "16",
      IDKR: "53",
      IDKS: "96",
      IDKT: "45",
      IDKU: "17",
      IDLA: "54",
      IDMA: "52",
      IDMU: "12",
      IDNB: "35",
      IDNT: "75",
      IDPA: "15",
      IDPB: "42",
      IDRI: "65",
      IDSA: "32",
      IDSB: "85",
      IDSG: "45",
      IDSN: "42",
      IDSR: "65",
      IDSS: "12",
      IDST: "53",
      IDSU: "78",
      IDYO: "54"
    }
  }
};