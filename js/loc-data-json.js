const LOC_DATA_JSON = 
{
	locstrings: 
	[
		{ 
			id: "INDEX_TITLE",
			language: "en",
			text: "Welcome - mytaikodrum.eu"
		}
		,
		{
			id: "WELCOME",
			language: "en",
			text: "Welcome to ..."
		}
		,
		{
			id: "INDEX_PARAGRAPH_1",
			language: "en",
			text: "With a mighty <strong>D O N</strong> we'd like to welcome you to my<strong>taiko</strong>drum.eu ! \
					This is the right place to starting your journey to create your own taiko drum. Step by step \
					we'd like to help you finding a drum and customizing it to your needs."
		}
		,
		{
			id: "INDEX_READY",
			language: "en",
			text: "Ready? Then click \"My taiko drum\""
		}
		,
		{
			id: "INDEX_BUTTON",
			language: "en",
			text: "My taiko drum!"
		}
		,
		{
			id: "INDEX_EXPO",
			language: "en",
			text: "Visit us at:"
		}
		,
		{
			id: "INDEX_ABOUT",
			language: "en",
			text: "About my<strong>taiko</strong>drum.eu:"
		}
		,
		{
			id: "INDEX_ABOUT_MORE",
			language: "en",
			text: "<u>WE are the people behind mytaikodrum.eu</u>, and we love \
				to accompany you on your way finding your perfect drum, with your rhythm \
				and personal style."
		}	
		,
		{
			id: "IMPRESSUM",
			language: "en",
			text: "Imprint"
		}
		,
		{
			id: "DATENSCHUTZ",
			language: "en",
			text: "Data protection"
		}
		,
		{
			id: "MYTAIKODRUM",
			language: "en",
			text: "my<strong>taiko</strong>drum.eu"
		}
		,
		
		{ 
			id: "HEADLINE_SIZEANDTYPE",
			language: "en",
			text: "Type and size of Taiko"
		}
		,
		{ 
			id: "ARTICLE_DRUMTYPE",
			language: "en",
			text: "Do I need a Hira- or Nagado Daiko?"
		}
		,
		{ 
			id: "LABEL_TYPE",
			language: "en",
			text: "I want a "
		}
		,
		{ 
			id: "OPTION_CHOOSE",
			language: "en",
			text: "Please choose..."
		}
		,
		{ 
			id: "OPTION_MIYA",
			language: "en",
			text: "Nagado-daiko"
		}
		,
		{ 
			id: "LABEL_SIZE",
			language: "en",
			text: " in the size of "
		}
		,
		{ 
			id: "OPTION_SIZE_14",
			language: "en",
			text: "42cm skin diameter "
		}
		,
		{ 
			id: "OPTION_SIZE_15",
			language: "en",
			text: "45cm skin diameter "
		}
		,
		{ 
			id: "OPTION_SIZE_16",
			language: "en",
			text: "48cm skin diameter "
		}
		,
		{ 
			id: "OPTION_SIZE_17",
			language: "en",
			text: "51cm skin diameter "
		}
		,
		{ 
			id: "TEXT_BASICPRICE",
			text: "für Basispreis von",
			text_en: "for basic price of"
		}
		,
		{ 
			id: "BUTTON_CHOOSE_WOOD",
			language: "en",
			text: "Choose wood & color >>"
		}
		,
		{ 
			id: "ARTICLE_DRUMTYPE_MIYA",
			language: "en",
			text: "<p>We offer Nagado-daikos and Hira-daikos in different sizes. Our Taikos are precisely manufactured in shape \
				and size as specified in Japan and in the unit of measurement Shaku. A shaku is almost exactly 30cm. \
				Thus, 1.4 shaku corresponds to a playable skin diameter of 42 cm (42 Nagado). 1.6 shaku are accordingly \
				48cm (playable) skin diameter (48er Nagado).</p>\
				<p>A <b>48 Nagado-daiko (1,6 shaku)</b> is a very universal drum. You can play them with very thick bachi, which is \
				very interesting for the side punch technique (Japanese &quot;Yoko-uchi&quot; or &quot;Naname-uchi&quot;). \
				Due to its size and weight of approx. 20kg, this drum is of course more complex to transport. The height \
				 of the Nagado-daiko is 60cm.</p> \
				<p>A <b>42 Nagado-daiko (1,4 shaku)</b> has clear advantages here and is in no way inferior to its larger sister in terms \
				of looks and sound. It weighs less than 14kg and fits in every car trunk and also likes to go on the back seat. \
				It also cuts a fine figure on an inclined stand and can still be played powerfully with medium Bachi. The height is 52.5 cm.</p>"
		}
		,
		{ 
			id: "ARTICLE_DRUMTYPE_HIRA",
			language: "en",
			text: "<p>If you want your Taiko to be even more mobile, you like to travel by bus and train and you want your Taiko to go with \
			every training or excursion, a <b>Hira-daiko (Japanese for &quot;flat drum&quot;)</b> suits you. We build them in 4 sizes as 42 mm \
			(playable skin diameter 42 cm) to 51 cm (1.4 to 1.7 shaku). The height of the drum body is about half that of a Miya-daiko. \
			Such a drum is much lighter and can be transported without a car. The sound of a hira-daiko is also flatter and the tone longer \
			than that of a miya. For the Taiko styles Yoko-uchi (Japanese for &quot;hit sideways&quot;) and Naname-uchi (Japanese for \
				&quot;hit at an angle&quot;) you need a Miya-daiko described above.</p>"

		}
	
	],

	getLocstring : function(locId, language)
	{
		for (i=0; i<this.locstrings.length ; i++)
		{
			if (this.locstrings[i].id == locId)
			{
				if (this.locstrings[i].language != null)
				{
					if (this.locstrings[i].language == language)
					{
						return this.locstrings[i].text;
					}
				}
				else
				{
					var text = null;

					if (language == "en")
						text = this.locstrings[i].text_en;

					return text != null ? text : this.locstrings[i].text;
				}
			}
		}

		return null;
	}
	,
	localizePage : function()
	{
		var elements = document.querySelectorAll(".localize");
		var lang = localStorage.getItem("lang");

		for (var i=0; i<elements.length; i++)
		{
			var locText = this.getLocstring(elements[i].id,lang);

			if (locText != null)
				elements[i].innerHTML = locText;
		}
	}
};