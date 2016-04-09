<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='pagehead';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	public function mailsend($to,$from,$from_name,$subject,$message)
	{
		$mail	= Yii::app()->Smtpmail;
		$mail->SetFrom($from,$from_name);
		$mail->Subject	= $subject;
		$mail->MsgHTML($message);
		$mail->AddAddress($to, "");

		if(!$mail->Send())
		{
			return false; // Fail echo "Mailer Error: " . $mail->ErrorInfo;
		}else
		{
			return true;	// Success
		 }
	}

public static function getapikey()
{
return '75q7rn79icn4j7';
}
public static function getapisecret()
{
return 'rDMR36xMUMznAWV0';
}
public static function getsecretkey()
{
return 'sk_test_3xLzd6FRdsrKl1uaWAUPTmWQ';
}
public static function getCountryNames()
    {
        return array("Afghanistan"=>"AFGHANISTAN","Albania"=>"ALBANIA","Algeria"=>"ALGERIA","American Samoa"=>"AMERICAN SAMOA","Andorra"=>"ANDORRA","Angola"=>"ANGOLA","Anguilla"=>"ANGUILLA","Antarctica"=>"ANTARCTICA","Antigua and Barbuda"=>"ANTIGUA AND BARBUDA","Argentina"=>"ARGENTINA","Armenia"=>"ARMENIA","Aruba"=>"ARUBA","Australia"=>"AUSTRALIA","Austria"=>"AUSTRIA","Azerbaijan"=>"AZERBAIJAN","Bahamas"=>"BAHAMAS","Bahrain"=>"BAHRAIN","Bangladesh"=>"BANGLADESH","Barbados"=>"BARBADOS","Belarus"=>"BELARUS","Belgium"=>"BELGIUM","Belize"=>"BELIZE","Benin"=>"BENIN","Bermuda"=>"BERMUDA","Bhutan"=>"BHUTAN","Bolivia"=>"BOLIVIA","Bosnia and Herzegovina"=>"BOSNIA AND HERZEGOVINA","Botswana"=>"BOTSWANA","Bouvet Island"=>"BOUVET ISLAND","Brazil"=>"BRAZIL","British Indian Ocean Territory"=>"BRITISH INDIAN OCEAN TERRITORY","Brunei Darussalam"=>"BRUNEI DARUSSALAM","Bulgaria"=>"BULGARIA","Burkina Faso"=>"BURKINA FASO","Burundi"=>"BURUNDI","Cambodia"=>"CAMBODIA","Cameroon"=>"CAMEROON","Canada"=>"CANADA","Cape Verde"=>"CAPE VERDE","Cayman Islands"=>"CAYMAN ISLANDS","Central African Republic"=>"CENTRAL AFRICAN REPUBLIC","Chad"=>"CHAD","Chile"=>"CHILE","China"=>"CHINA","Christmas Island"=>"CHRISTMAS ISLAND","Cocos (Keeling) Islands"=>"COCOS (KEELING) ISLANDS","Colombia"=>"COLOMBIA","Comoros"=>"COMOROS","Congo"=>"CONGO","Congo, the Democratic Republic of the"=>"CONGO, THE DEMOCRATIC REPUBLIC OF THE","Cook Islands"=>"COOK ISLANDS","Costa Rica"=>"COSTA RICA","Cote D'Ivoire"=>"COTE D'IVOIRE","Croatia"=>"CROATIA","Cuba"=>"CUBA","Cyprus"=>"CYPRUS","Czech Republic"=>"CZECH REPUBLIC","Denmark"=>"DENMARK","Djibouti"=>"DJIBOUTI","Dominica"=>"DOMINICA","Dominican Republic"=>"DOMINICAN REPUBLIC","Ecuador"=>"ECUADOR","Egypt"=>"EGYPT","El Salvador"=>"EL SALVADOR","Equatorial Guinea"=>"EQUATORIAL GUINEA","Eritrea"=>"ERITREA","Estonia"=>"ESTONIA","Ethiopia"=>"ETHIOPIA","Falkland Islands (Malvinas)"=>"FALKLAND ISLANDS (MALVINAS)","Faroe Islands"=>"FAROE ISLANDS","Fiji"=>"FIJI","Finland"=>"FINLAND","France"=>"FRANCE","French Guiana"=>"FRENCH GUIANA","French Polynesia"=>"FRENCH POLYNESIA","French Southern Territories"=>"FRENCH SOUTHERN TERRITORIES","Gabon"=>"GABON","Gambia"=>"GAMBIA","Georgia"=>"GEORGIA","Germany"=>"GERMANY","Ghana"=>"GHANA","Gibraltar"=>"GIBRALTAR","Greece"=>"GREECE","Greenland"=>"GREENLAND","Grenada"=>"GRENADA","Guadeloupe"=>"GUADELOUPE","Guam"=>"GUAM","Guatemala"=>"GUATEMALA","Guinea"=>"GUINEA","Guinea-Bissau"=>"GUINEA-BISSAU","Guyana"=>"GUYANA","Haiti"=>"HAITI","Heard Island and Mcdonald Islands"=>"HEARD ISLAND AND MCDONALD ISLANDS","Holy See (Vatican City State)"=>"HOLY SEE (VATICAN CITY STATE)","Honduras"=>"HONDURAS","Hong Kong"=>"HONG KONG","Hungary"=>"HUNGARY","Iceland"=>"ICELAND","India"=>"INDIA","Indonesia"=>"INDONESIA","Iran, Islamic Republic of"=>"IRAN, ISLAMIC REPUBLIC OF","Iraq"=>"IRAQ","Ireland"=>"IRELAND","Israel"=>"ISRAEL","Italy"=>"ITALY","Jamaica"=>"JAMAICA","Japan"=>"JAPAN","Jordan"=>"JORDAN","Kazakhstan"=>"KAZAKHSTAN","Kenya"=>"KENYA","Kiribati"=>"KIRIBATI","Korea, Democratic People's Republic of"=>"KOREA, DEMOCRATIC PEOPLE'S REPUBLIC OF","Korea, Republic of"=>"KOREA, REPUBLIC OF","Kuwait"=>"KUWAIT","Kyrgyzstan"=>"KYRGYZSTAN","Lao People's Democratic Republic"=>"LAO PEOPLE'S DEMOCRATIC REPUBLIC","Latvia"=>"LATVIA","Lebanon"=>"LEBANON","Lesotho"=>"LESOTHO","Liberia"=>"LIBERIA","Libyan Arab Jamahiriya"=>"LIBYAN ARAB JAMAHIRIYA","Liechtenstein"=>"LIECHTENSTEIN","Lithuania"=>"LITHUANIA","Luxembourg"=>"LUXEMBOURG","Macao"=>"MACAO","Macedonia, the Former Yugoslav Republic of"=>"MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF","Madagascar"=>"MADAGASCAR","Malawi"=>"MALAWI","Malaysia"=>"MALAYSIA","Maldives"=>"MALDIVES","Mali"=>"MALI","Malta"=>"MALTA","Marshall Islands"=>"MARSHALL ISLANDS","Martinique"=>"MARTINIQUE","Mauritania"=>"MAURITANIA","Mauritius"=>"MAURITIUS","Mayotte"=>"MAYOTTE","Mexico"=>"MEXICO","Micronesia, Federated States of"=>"MICRONESIA, FEDERATED STATES OF","Moldova, Republic of"=>"MOLDOVA, REPUBLIC OF","Monaco"=>"MONACO","Mongolia"=>"MONGOLIA","Montserrat"=>"MONTSERRAT","Morocco"=>"MOROCCO","Mozambique"=>"MOZAMBIQUE","Myanmar"=>"MYANMAR","Namibia"=>"NAMIBIA","Nauru"=>"NAURU","Nepal"=>"NEPAL","Netherlands"=>"NETHERLANDS","Netherlands Antilles"=>"NETHERLANDS ANTILLES","New Caledonia"=>"NEW CALEDONIA","New Zealand"=>"NEW ZEALAND","Nicaragua"=>"NICARAGUA","Niger"=>"NIGER","Nigeria"=>"NIGERIA","Niue"=>"NIUE","Norfolk Island"=>"NORFOLK ISLAND","Northern Mariana Islands"=>"NORTHERN MARIANA ISLANDS","Norway"=>"NORWAY","Oman"=>"OMAN","Pakistan"=>"PAKISTAN","Palau"=>"PALAU","Palestinian Territory, Occupied"=>"PALESTINIAN TERRITORY, OCCUPIED","Panama"=>"PANAMA","Papua New Guinea"=>"PAPUA NEW GUINEA","Paraguay"=>"PARAGUAY","Peru"=>"PERU","Philippines"=>"PHILIPPINES","Pitcairn"=>"PITCAIRN","Poland"=>"POLAND","Portugal"=>"PORTUGAL","Puerto Rico"=>"PUERTO RICO","Qatar"=>"QATAR","Reunion"=>"REUNION","Romania"=>"ROMANIA","Russian Federation"=>"RUSSIAN FEDERATION","Rwanda"=>"RWANDA","Saint Helena"=>"SAINT HELENA","Saint Kitts and Nevis"=>"SAINT KITTS AND NEVIS","Saint Lucia"=>"SAINT LUCIA","Saint Pierre and Miquelon"=>"SAINT PIERRE AND MIQUELON","Saint Vincent and the Grenadines"=>"SAINT VINCENT AND THE GRENADINES","Samoa"=>"SAMOA","San Marino"=>"SAN MARINO","Sao Tome and Principe"=>"SAO TOME AND PRINCIPE","Saudi Arabia"=>"SAUDI ARABIA","Senegal"=>"SENEGAL","Serbia and Montenegro"=>"SERBIA AND MONTENEGRO","Seychelles"=>"SEYCHELLES","Sierra Leone"=>"SIERRA LEONE","Singapore"=>"SINGAPORE","Slovakia"=>"SLOVAKIA","Slovenia"=>"SLOVENIA","Solomon Islands"=>"SOLOMON ISLANDS","Somalia"=>"SOMALIA","South Africa"=>"SOUTH AFRICA","South Georgia and the South Sandwich Islands"=>"SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS","Spain"=>"SPAIN","Sri Lanka"=>"SRI LANKA","Sudan"=>"SUDAN","Suriname"=>"SURINAME","Svalbard and Jan Mayen"=>"SVALBARD AND JAN MAYEN","Swaziland"=>"SWAZILAND","Sweden"=>"SWEDEN","Switzerland"=>"SWITZERLAND","Syrian Arab Republic"=>"SYRIAN ARAB REPUBLIC","Taiwan, Province of China"=>"TAIWAN, PROVINCE OF CHINA","Tajikistan"=>"TAJIKISTAN","Tanzania, United Republic of"=>"TANZANIA, UNITED REPUBLIC OF","Thailand"=>"THAILAND","Timor-Leste"=>"TIMOR-LESTE","Togo"=>"TOGO","Tokelau"=>"TOKELAU","Tonga"=>"TONGA","Trinidad and Tobago"=>"TRINIDAD AND TOBAGO","Tunisia"=>"TUNISIA","Turkey"=>"TURKEY","Turkmenistan"=>"TURKMENISTAN","Turks and Caicos Islands"=>"TURKS AND CAICOS ISLANDS","Tuvalu"=>"TUVALU","Uganda"=>"UGANDA","Ukraine"=>"UKRAINE","United Arab Emirates"=>"UNITED ARAB EMIRATES","United Kingdom"=>"UNITED KINGDOM","United States"=>"UNITED STATES","United States Minor Outlying Islands"=>"UNITED STATES MINOR OUTLYING ISLANDS","Uruguay"=>"URUGUAY","Uzbekistan"=>"UZBEKISTAN","Vanuatu"=>"VANUATU","Venezuela"=>"VENEZUELA","Viet Nam"=>"VIET NAM","Virgin Islands, British"=>"VIRGIN ISLANDS, BRITISH","Virgin Islands, U.s."=>"VIRGIN ISLANDS, U.S.","Wallis and Futuna"=>"WALLIS AND FUTUNA","Western Sahara"=>"WESTERN SAHARA","Yemen"=>"YEMEN","Zambia"=>"ZAMBIA","Zimbabwe"=>"ZIMBABWE");
    }
}
