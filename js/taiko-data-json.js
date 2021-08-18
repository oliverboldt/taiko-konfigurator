const TAIKO_DATA_JSON = 
{
	nails :
	[
		  { id: "NAIL_20MM", 			
	  			price: "0.0",
	  			diameter: "20.0",
	  			thumbnail: "nagel-20mm-120px.jpg", 	
	  			description: "20mm Nägel aus deutscher Produktion",
	  			description_en: "20mm nails from Germany" }
		, { id: "NAIL_19MM", 			
	  			price: "0.22",
	  			diameter: "19.0",
	  			thumbnail: "nagel-19mm-120px.jpg", 	
	  			description: "19mm Nägel, Japan-Qualität",
	  			description_en: "19mm nails from Japan" }
		, { id: "NAIL_16MM", 			
	  			price: "0.20",
	  			diameter: "17.0",
	  			thumbnail: "nagel-16mm-120px.jpg", 	
	  			description: "16mm Nägel, Japan-Qualität",
	  			description_en: "16mm nails from Japan" }
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
		  	natural: "0",
		  	description: "Esche gebeizt",
		  	description_en: "Ash stained"
		}
		, 
		{ 
			id: "WOOD_MAPLE", 
			natural: "0",
			description: "Ahorn gebeizt", 
			description_en: "Maple stained",
			prices:
			[
				  { drumid: "SHIME_DAIKO_3", price: "15" }
				, { drumid: "SHIME_DAIKO_4", price: "15" }
				, { drumid: "HIRA_DAIKO_14", price: "15" }
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
			natural: "1",
			description: "Rüster natur",
			description_en: "Elm natural",
			prices:
			[
				  { drumid: "SHIME_DAIKO_3", price: "15" }
				, { drumid: "SHIME_DAIKO_4", price: "15" }
				, { drumid: "HIRA_DAIKO_14", price: "15" }
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
		  	thumbnail_shime: "shime.jpg",
		  	description: "Rüster Natur",
		  	description_en: "Elm natural"  
		}
		, 
		{ 
			id: "WOODCOLOR_PEAR",   
		  	thumbnail: "woodcolor-pear.jpg",   
		  	thumbnail_miya: "miya-pear.jpg",
		  	thumbnail_hira: "hira-pear.jpg",
		  	thumbnail_shime: "shime.jpg",
			description: "Farbton Birne/Rüster",
			description_en: "Colour Pear/Elmwood"
		}
		, 
		{ 
			id: "WOODCOLOR_NUT",   
		  	thumbnail: "woodcolor-nut.jpg",   
		  	thumbnail_miya: "miya-darkbrown.jpg",
		  	thumbnail_hira: "hira-darkbrown.jpg",
		  	thumbnail_shime: "shime.jpg",
			description: "Farbton Nuss/Dunkelbraun",
			description_en: "Colour Nut/darkbrown"
		}
		, 
		{ 
			id: "WOODCOLOR_REDBROWN", 
		  	thumbnail: "woodcolor-redbrown.jpg",   
		  	thumbnail_miya: "miya-redbrown.jpg",
		  	thumbnail_hira: "hira-redbrown.jpg",
		  	thumbnail_shime: "shime.jpg",
			description: "Farbton Rotbraun",
			description_en: "Colour Redbrown" 
		}
		, 
		{ 
			id: "WOODCOLOR_RED", 
		  	thumbnail: "woodcolor-darkred.jpg", 
		  	thumbnail_miya: "miya-darkred.jpg",
		  	thumbnail_hira: "hira-darkred.jpg",
		  	thumbnail_shime: "shime.jpg",  
			description: "Farbton Dunkelrot",
			description_en: "Colour Darkred" 
		}
		, 
		{ 
			id: "WOODCOLOR_SPECIAL", 
		  	thumbnail_miya: "miya-special.jpg",
		  	thumbnail_hira: "hira-special.jpg",
		  	thumbnail_shime: "shime.jpg",
		  	thumbnail: "woodcolor-special.jpg",   
			description: "Wunschfarbe",
			description_en: "Colour of choice" 
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
			name: 			"Hira daiko 42cm",
			diameter:		"1.4",
			thumbnail: 		"hira.jpg",
			thumbnail_size: "hira-14-masse.jpg",
			description: 	"Hira daiko, Fell-Durchmesser 42cm, Höhe 24,5cm",
			description_en: "Hira daiko, skin diameter 42cm, height: 24.5cm",
			price: 			"750",
			option_handle : [ "HANDLE_NONE", "HANDLE_BRASS_SMALL", "HANDLE_STEEL_SMALL", "HANDLE_STEEL_NOBASE" ]
		}
		,
		{
			id: 			"HIRA_DAIKO_15", 
			name: 			"Hira daiko 45cm",
			diameter:		"1.5",
			thumbnail: 		"hira.jpg",
			thumbnail_size: "hira-15-masse.jpg",
			description: 	"Hira daiko, Fell-Durchmesser 45cm (1,5shaku), Höhe 26cm",
			description_en: "Hira daiko, skin diameter 45cm (1.5shaku), height: 26cm",
			price: 			"850",
			option_handle : [ "HANDLE_NONE", "HANDLE_BRASS_SMALL", "HANDLE_STEEL_SMALL", "HANDLE_STEEL_NOBASE" ]
		}
		,
		{
			id: 			"HIRA_DAIKO_16", 
			name: 			"Hira daiko 48cm",
			diameter:		"1.6",
			thumbnail: 		"hira.jpg",
			thumbnail_size: "hira-16-masse.jpg",
			description: 	"Hira daiko, Fell-Durchmesser 48cm (1,6shaku), Höhe 27,5cm",
			description_en: "Hira daiko, skin diameter 48cm (1.6shaku), height: 27.5cm",			
			price: 			"935",
			option_handle : [ "HANDLE_NONE", "HANDLE_BRASS_SMALL", "HANDLE_STEEL_SMALL", "HANDLE_STEEL_NOBASE" ]
		}
		,
		{
			id: 			"HIRA_DAIKO_17", 
			name: 			"Hira daiko 51cm",
			diameter:		"1.7",
			thumbnail: 		"hira.jpg",
			thumbnail_size: "hira-17-masse.jpg",
			description: 	"Hira daiko, Fell-Durchmesser 51cm (1,7shaku), Höhe 29cm",
			description_en: "Hira daiko, skin diameter 51cm (1.7shaku), height: 29cm",
			price: 			"980",
			option_handle : [ "HANDLE_NONE", "HANDLE_BRASS_SMALL", "HANDLE_STEEL_SMALL", "HANDLE_STEEL_NOBASE" ]
		}
		,
		{
			id: 			"MIYA_DAIKO_14", 
			name: 			"Miya daiko 42cm",
			name_en: 		"Nagado daiko 42cm",
			diameter:		"1.5",
			thumbnail: 		"miya-redbrown.jpg",
			thumbnail_size: "miya-14-masse.jpg",
			description: 	"Miya daiko, Fell-Durchmesser 42cm (1,4shaku)",
			description_en: "Nagado daiko, skin-diameter 42cm (1.4shaku)",
			price: 			"1100",
			option_handle : [ "HANDLE_NONE", "HANDLE_BRASS_SMALL", "HANDLE_BRASS_BIG", "HANDLE_STEEL_SMALL", "HANDLE_STEEL_BIG", "HANDLE_STEEL_NOBASE" ]
		}
		,
		{
			id: 			"MIYA_DAIKO_15", 
			name: 			"Miya daiko 45cm",
			name_en: 		"Nagado daiko 45cm",
			diameter:		"1.5",
			thumbnail: 		"miya-redbrown.jpg",
			thumbnail_size: "miya-15-masse.jpg",
			description: 	"Miya daiko, Fell-Durchmesser 45cm (1,5shaku)",
			description_en: "Nagado daiko, skin-diameter 45cm (1.5shaku)",
			price: 			"1245",
			option_handle : [ "HANDLE_NONE", "HANDLE_BRASS_SMALL", "HANDLE_BRASS_BIG", "HANDLE_STEEL_SMALL", "HANDLE_STEEL_BIG", "HANDLE_STEEL_NOBASE" ]
		}
		,
		{
			id: 			"MIYA_DAIKO_16", 
			name: 			"Miya daiko 48cm",
			name_en: 		"Nagado daiko 48cm",
			diameter:		"1.6",
			thumbnail: 		"miya-redbrown.jpg",
			thumbnail_size: "miya-16-masse.jpg",
			description: 	"Miya daiko, Fell-Durchmesser 48cm (1,6shaku)",
			description_en: "Nagado daiko, skin-diameter 48cm (1.6shaku)",
			price: 			"1390",
			option_handle : [ "HANDLE_NONE", "HANDLE_BRASS_SMALL", "HANDLE_BRASS_BIG", "HANDLE_STEEL_SMALL", "HANDLE_STEEL_BIG", "HANDLE_STEEL_NOBASE" ]
		}
		,
		{
			id: 			"SHIME_DAIKO_3", 
			name: 			"Shime daiko Größe 3",
			name_en: 		"Shime daiko Type 3",
			thumbnail: 		"shime.jpg",
			thumbnail_size: "shime-3-masse.jpg",
			description: 	"Shime daiko #3, Durchmesser 35cm, Höhe 18cm",
			description_en: "Shime daiko #3, Diameter 35cm, height 18cm ",
			price: 			"780"
		}
		,
		{
			id: 			"SHIME_DAIKO_4", 
			name: 			"Shime daiko Größe 4",
			name_en: 		"Shime daiko Type 4",
			thumbnail: 		"shime.jpg",
			thumbnail_size: "shime-4-masse.jpg",
			description: 	"Shime daiko #4, Durchmesser 35cm, Höhe 21cm",
			description_en: "Shime daiko #4, Diameter 35cm, height 21cm ",
			price: 			"850"
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
	,
	isShime : function(drumId)
	{
		return drumId.includes("SHIME_DAIKO");
	}	
};
