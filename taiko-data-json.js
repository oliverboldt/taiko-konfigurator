const TAIKO_DATA_JSON = 
{
	nails :
	[
		  { id: "NAIL_20MM", 			
	  			price: "0.0",
	  			diameter: "20.0",
	  			thumbnail: "nagel-20mm-120px.jpg", 	
	  			description: "20mm Nägel aus deutscher Produktion",
	  			description_en: "20mm nail from Germany" }
		, { id: "NAIL_19MM", 			
	  			price: "0.22",
	  			diameter: "19.0",
	  			thumbnail: "nagel-19mm-120px.jpg", 	
	  			description: "19mm Nägel, Japan-Qualität",
	  			description_en: "19mm nail from Japan" }
		, { id: "NAIL_16MM", 			
	  			price: "0.20",
	  			diameter: "17.0",
	  			thumbnail: "nagel-16mm-120px.jpg", 	
	  			description: "16mm Nägel, Japan-Qualität",
	  			description_en: "16mm nail from Japan" }
	]
	,
	handles : 
	[ 
		  { id: "HANDLE_NONE", 			
	  			price: "0",
	  			thumbnail: "woodcolor-pear.jpg", 	
	  			description: "Ohne Haltegriffe",
	  			description_en: "Without handles" }
		, { id: "HANDLE_BRASS_SMALL", 	
				price: "100", 	
	  			thumbnail: "kan-messingrosette-gross-frei.png", 	
				description: "Haltegriffe mit Messingrosette (klein)",
				description_en: "Handles with brass rosette (small)" } 
		, { id: "HANDLE_BRASS_BIG", 	
				price: "100", 	
	  			thumbnail: "kan-messingrosette-gross-frei.png", 	
				description: "Haltegriffe mit Messingrosette (groß)",
				description_en: "Handles with brass rosette (big)"  } 
		, { id: "HANDLE_STEEL_SMALL", 	
				price: "100", 	
	  			thumbnail: "kan-stahlrosette-gross-frei.png", 	
				description: "Haltegriffe mit Stahlrosette (klein)",
				description_en: "Handles with steel rosette (small)"  } 
		, { id: "HANDLE_STEEL_BIG", 	
				price: "100", 	
	  			thumbnail: "kan-stahlrosette-gross-frei.png", 	
				description: "Haltegriffe mit Stahlrosette (groß)",
				description_en: "Handles with steel rosette (big)"  } 
		, { id: "HANDLE_STEEL_NOBASE", 	
				price: "70", 	
	  			thumbnail: "kan-ohnegrundplatte-frei.png", 	
				description: "Haltegriffe mit Stahlrosette ohne Grundplatte",
				description_en: "Handles with steel rosette without base plate" } 
	]
	,	
	woodtypes :
	[
		{ 
		  	id: "WOOD_ASH",   
		  	description: "Esche gebeizt",
		  	description_en: "Ash"
		}
		, 
		{ 
			id: "WOOD_MAPLE", 
			description: "Ahorn gebeizt", 
			description_en: "Maple",
			prices:
			[
				  { drumid: "HIRA_DAIKO_14", price: "15" }
				, { drumid: "HIRA_DAIKO_15", price: "15" }
				, { drumid: "HIRA_DAIKO_16", price: "20" }
				, { drumid: "HIRA_DAIKO_17", price: "20" }
				, { drumid: "MIYA_DAIKO_14", price: "40" }
				, { drumid: "MIYA_DAIKO_15", price: "50" }
				, { drumid: "MIYA_DAIKO_16", price: "60" }
			]
		}
		, 
		{ 
			id: "WOOD_ELM",   
			description: "Rüster natur",
			description_en: "Elm natural",
			prices:
			[
				  { drumid: "HIRA_DAIKO_14", price: "15" }
				, { drumid: "HIRA_DAIKO_15", price: "15" }
				, { drumid: "HIRA_DAIKO_16", price: "20" }
				, { drumid: "HIRA_DAIKO_17", price: "20" }
				, { drumid: "MIYA_DAIKO_14", price: "40" }
				, { drumid: "MIYA_DAIKO_15", price: "50" }
				, { drumid: "MIYA_DAIKO_16", price: "60" }
			]
		}
	]
	,
	woodcolors :
	[
		{ 
		  	id: "WOODCOLOR_NATURAL",
		  	thumbnail: "woodcolor-nature.jpg",   
		  	thumbnail_miya: "miya-pear.jpg",
		  	thumbnail_hira: "hira.jpg",
		  	description: "Rüster Natur",
		  	description_en: "Elm natural"  
		}
		, 
		{ 
			id: "WOODCOLOR_PEAR",   
		  	thumbnail: "woodcolor-pear.jpg",   
		  	thumbnail_miya: "miya-pear.jpg",
		  	thumbnail_hira: "hira.jpg",
			description: "Farbton Birne/Rüster",
			description_en: "Pear/Elmwood"
		}
		, 
		{ 
			id: "WOODCOLOR_NUT",   
		  	thumbnail: "woodcolor-nut.jpg",   
		  	thumbnail_miya: "miya-darkbrown.jpg",
		  	thumbnail_hira: "hira.jpg",
			description: "Farbton Nuss/Dunkelbraun",
			description_en: "Nut/darkbrown"
		}
		, 
		{ 
			id: "WOODCOLOR_REDBROWN", 
		  	thumbnail: "woodcolor-redbrown.jpg",   
		  	thumbnail_miya: "miya-redbrown.jpg",
		  	thumbnail_hira: "hira.jpg",
			description: "Farbton Rotbraun",
			description_en: "Redbrown" 
		}
		, 
		{ 
			id: "WOODCOLOR_RED", 
		  	thumbnail_miya: "miya-darkred.jpg",
		  	thumbnail_hira: "hira.jpg",
		  	thumbnail: "woodcolor-darkred.jpg",   
			description: "Farbton Dunkelrot",
			description_en: "Darkred" 
		}
		, 
		{ 
			id: "WOODCOLOR_SPECIAL", 
		  	thumbnail_miya: "miya-pear.jpg",
		  	thumbnail_hira: "hira.jpg",
		  	thumbnail: "woodcolor-special.jpg",   
			description: "Wunschfarbe",
			description_en: "Color of choice" 
		}
	]
	,
	// text : 
	// [ 
	//		{ id: "MIYA_DAIKO_14+description+de", text: "Nagado Daiko 1.4shaku"}
	// ]

	drums : 
	[
		{
			id: 			"HIRA_DAIKO_14", 
			name: 			"Hira daiko 1,4 shaku",
			diameter:		"1.4",
			thumbnail: 		"hira.jpg",
			thumbnail_size: "hira-14-masse.jpg",
			description: 	"Fell-Durchmesser 42cm, Höhe 24,5cm",
			description_en: "Skin-d: 42cm",
			price: 			"750",
			option_handle : [ "HANDLE_NONE", "HANDLE_BRASS_SMALL", "HANDLE_STEEL_SMALL", "HANDLE_STEEL_NOBASE" ]
		}
		,
		{
			id: 			"HIRA_DAIKO_15", 
			name: 			"Hira daiko 1,5 shaku",
			diameter:		"1.5",
			thumbnail: 		"hira.jpg",
			thumbnail_size: "hira-15-masse.jpg",
			description: 	"Fell-Durchmesser 45cm, Höhe 26cm",
			price: 			"850",
			option_handle : [ "HANDLE_NONE", "HANDLE_BRASS_SMALL", "HANDLE_STEEL_SMALL", "HANDLE_STEEL_NOBASE" ]
		}
		,
		{
			id: 			"HIRA_DAIKO_16", 
			name: 			"Hira daiko 1,6 shaku",
			diameter:		"1.6",
			thumbnail: 		"hira.jpg",
			thumbnail_size: "hira-16-masse.jpg",
			description: 	"Fell-Durchmesser 48cm, Höhe 27,5cm",
			price: 			"950",
			option_handle : [ "HANDLE_NONE", "HANDLE_BRASS_SMALL", "HANDLE_STEEL_SMALL", "HANDLE_STEEL_NOBASE" ]
		}
		,
		{
			id: 			"HIRA_DAIKO_17", 
			name: 			"Hira daiko 1,7 shaku",
			diameter:		"1.7",
			thumbnail: 		"hira.jpg",
			thumbnail_size: "hira-17-masse.jpg",
			description: 	"Fell-Durchmesser 51cm, Höhe 29cm",
			price: 			"1050",
			option_handle : [ "HANDLE_NONE", "HANDLE_BRASS_SMALL", "HANDLE_STEEL_SMALL", "HANDLE_STEEL_NOBASE" ]
		}
		,
		{
			id: 			"MIYA_DAIKO_14", 
			name: 			"Miya daiko 1,4 shaku",
			diameter:		"1.5",
			thumbnail: 		"miya-redbrown.jpg",
			thumbnail_size: "miya-14-masse.jpg",
			description: 	"Fell-Durchmesser 42cm",
			description_en: "Skin-d: 42cm",
			price: 			"1100",
			option_handle : [ "HANDLE_NONE", "HANDLE_BRASS_SMALL", "HANDLE_BRASS_BIG", "HANDLE_STEEL_SMALL", "HANDLE_STEEL_BIG", "HANDLE_STEEL_NOBASE" ]
		}
		,
		{
			id: 			"MIYA_DAIKO_15", 
			name: 			"Miya daiko 1,5 shaku",
			diameter:		"1.5",
			thumbnail: 		"miya-redbrown.jpg",
			thumbnail_size: "miya-15-masse.jpg",
			description: 	"Fell-Durchmesser 45cm",
			price: 			"1275",
			option_handle : [ "HANDLE_NONE", "HANDLE_BRASS_SMALL", "HANDLE_BRASS_BIG", "HANDLE_STEEL_SMALL", "HANDLE_STEEL_BIG", "HANDLE_STEEL_NOBASE" ]
		}
		,
		{
			id: 			"MIYA_DAIKO_16", 
			name: 			"Miya daiko 1,6 shaku",
			diameter:		"1.6",
			thumbnail: 		"miya-redbrown.jpg",
			thumbnail_size: "miya-16-masse.jpg",
			description: 	"Fell-d: 48cm",
			price: 			"1450",
			option_handle : [ "HANDLE_NONE", "HANDLE_BRASS_SMALL", "HANDLE_BRASS_BIG", "HANDLE_STEEL_SMALL", "HANDLE_STEEL_BIG", "HANDLE_STEEL_NOBASE" ]
		}
	],

	getDrumDataForId : function(drumId)
	{
		for (i=0; i<this.drums.length; i++)
		{
			if (this.drums[i].id == drumId)
			{
				return this.drums[i];
			}
		}

		return null;
	}
	,
	getWoodtypeDataForId : function(woodtypeId)
	{
		for (i=0; i<this.woodtypes.length ; i++)
		{
			if (this.woodtypes[i].id == woodtypeId)
			{
				return this.woodtypes[i];
			}
		}

		return null;
	}
	,
	getWoodcolorDataForId : function(woodcolorId)
	{
		for (i=0; i<this.woodcolors.length ; i++)
		{
			if (this.woodcolors[i].id == woodcolorId)
			{
				return this.woodcolors[i];
			}
		}

		return null;
	}
	,
	getHandleDataForId : function(handleId)
	{
		for (i=0; i<this.handles.length ; i++)
		{
			if (this.handles[i].id == handleId)
			{
				return this.handles[i];
			}
		}

		return null;
	}
	,
	getNailDataForId : function(nailId)
	{
		for (i=0; i<this.nails.length ; i++)
		{
			if (this.nails[i].id == nailId)
			{
				return this.nails[i];
			}
		}

		return null;
	}
	,
	getPriceForWood : function(woodtype, drumId)
	{
		if (woodtype.prices != null)
		{
			for (j=0; j<woodtype.prices.length; j++)
			{
				if (woodtype.prices[j].drumid == drumId)
				{
					return parseInt(woodtype.prices[j].price);
				}
			}					
		}

		return 0;
	}
	,
	getWoodPrice : function(woodtypeId, drumId)
	{
		this.getPriceForWood(this.getWoodtypeDataForId(woodtypeId), drumId);
	}
	,
	isMiya : function(drumId)
	{
		return drumId.includes("MIYA_DAIKO");
	}
	,
	isHira : function(drumId)
	{
		return drumId.includes("HIRA_DAIKO");
	}
	
};
