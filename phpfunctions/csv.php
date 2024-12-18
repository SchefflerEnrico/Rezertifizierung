$datevMandant = $externalDB->fetchOne($result);

$filename = "EXTF_" . $this->getTableValue('invoice_internalNr') . '_' . date("Y-m-d") . ".csv";
$dataFile = [];
$dataHeader = 
// Kopfzeile
[
    "EXTF",//A
    "700",//B
    "21",//C
    "Buchungsstapel",//D
    "13",//E
    date('YmdHis'),//F
    "JR",//G
    "",//H
    "0001545HAR0000000031",//I
    "",//J
    "386850",//K
    $datevMandant,//L
    date('Y0101'),//M
    "4",//N
    date("Ym01"),//O
    date('Ymt'),//P
    "Aufteilung " . $this->getTableValue('invoice_voucherNr'),//Q
    "",//R
    "1",//S
    "0",//T
    "0",//U
    "",//V
    "",//W
    "",//X
    "",//Y
    "",//Z
    ""//AA
];
$count = array_push($dataFile, $dataHeader); 


// Beispiel-Datenzeilen
$dataHead = [
    "Umsatz (ohne Soll/Haben-Kz)",
    "Soll/Haben-Kennzeichen",
    "WKZ Umsatz",
    "Kurs",
    "Basis-Umsatz",
    "WKZ Basis-Umsatz",
    "Konto",
    "Gegenkonto (ohne BU-Schlüssel)",
    "BU-Schlüssel",
    "Belegdatum",
    "Belegfeld 1",
    "Belegfeld 2",
    "Skonto",
    "Buchungstext",
    "Postensperre",
    "Diverse Adressnummer",
    "Geschäftspartnerbank",
    "Sachverhalt",
    "Zinssperre",
    "Beleglink",
    "Beleginfo - Art 1",
    "Beleginfo - Inhalt 1",
    "Beleginfo - Art 2",
    "Beleginfo - Inhalt 2",
    "Beleginfo - Art 3",
    "Beleginfo - Inhalt 3",
    "Beleginfo - Art 4",
    "Beleginfo - Inhalt 4",
    "Beleginfo - Art 5",
    "Beleginfo - Inhalt 5",
    "Beleginfo - Art 6",
    "Beleginfo - Inhalt 6",
    "Beleginfo - Art 7",
    "Beleginfo - Inhalt 7",
    "Beleginfo - Art 8",
    "Beleginfo - Inhalt 8",
    "KOST1 - Kostenstelle",
    "KOST2 - Kostenstelle",
    "Kost-Menge",
    "EU-Land u. UStID (Bestimmung)",
    "EU-Steuersatz (Bestimmung)",
    "Abw. Versteuerungsart",
    "Sachverhalt L+L",
    "Funktionsergänzung L+L",
    "BU 49 Hauptfunktionstyp",
    "BU 49 Hauptfunktionsnummer",
    "BU 49 Funktionsergänzung",
    "Zusatzinformation - Art 1",
    "Zusatzinformation- Inhalt 1",
    "Zusatzinformation - Art 2",
    "Zusatzinformation- Inhalt 2",
    "Zusatzinformation - Art 3",
    "Zusatzinformation- Inhalt 3",
    "Zusatzinformation - Art 4",
    "Zusatzinformation- Inhalt 4",
    "Zusatzinformation - Art 5",
    "Zusatzinformation- Inhalt 5",
    "Zusatzinformation - Art 6",
    "Zusatzinformation- Inhalt 6",
    "Zusatzinformation - Art 7",
    "Zusatzinformation- Inhalt 7",
    "Zusatzinformation - Art 8",
    "Zusatzinformation- Inhalt 8",
    "Zusatzinformation - Art 9",
    "Zusatzinformation- Inhalt 9",
    "Zusatzinformation - Art 10",
    "Zusatzinformation- Inhalt 10",
    "Zusatzinformation - Art 11",
    "Zusatzinformation- Inhalt 11",
    "Zusatzinformation - Art 12",
    "Zusatzinformation- Inhalt 12",
    "Zusatzinformation - Art 13",
    "Zusatzinformation- Inhalt 13",
    "Zusatzinformation - Art 14",
    "Zusatzinformation- Inhalt 14",
    "Zusatzinformation - Art 15",
    "Zusatzinformation- Inhalt 15",
    "Zusatzinformation - Art 16",
    "Zusatzinformation- Inhalt 16",
    "Zusatzinformation - Art 17",
    "Zusatzinformation- Inhalt 17",
    "Zusatzinformation - Art 18",
    "Zusatzinformation- Inhalt 18",
    "Zusatzinformation - Art 19",
    "Zusatzinformation- Inhalt 19",
    "Zusatzinformation - Art 20",
    "Zusatzinformation- Inhalt 20",
    "Stück",
    "Gewicht",
    "Zahlweise",
    "Forderungsart",
    "Veranlagungsjahr",
    "Zugeordnete Fälligkeit",
    "Skontotyp",
    "Auftragsnummer",
    "Buchungstyp (Anzahlungen)",
    "USt-Schlüssel (Anzahlungen)",
    "EU-Land (Anzahlungen)",
    "Sachverhalt L+L (Anzahlungen)",
    "EU-Steuersatz (Anzahlungen)",
    "Erlöskonto (Anzahlungen)",
    "Herkunft-Kz",
    "Buchungs GUID",
    "KOST-Datum",
    "SEPA-Mandatsreferenz",
    "Skontosperre",
    "Gesellschaftername",
    "Beteiligtennummer",
    "Identifikationsnummer",
    "Zeichnernummer",
    "Postensperre bis",
    "Bezeichnung SoBil-Sachverhalt",
    "Kennzeichen SoBil-Buchung",
    "Festschreibung",
    "Leistungsdatum",
    "Datum Zuord. Steuerperiode",
    "Fälligkeit",
    "Generalumkehr (GU)",
    "Steuersatz",
    "Land",
    "Abrechnungsreferenz",
    "BVV-Position",
    "EU-Land u. UStID (Ursprung)",
    "EU-Steuersatz (Ursprung)",
    "Abw. Skontokonto"
];        
$count = array_push($dataFile, $dataHead); 

$subtable = 'UT_POSITIONS';
$subtableRowIds = $this->getSubtableRowIds($subtable);
foreach ($subtableRowIds as $row) {
    
    $performDate = "";
    if(substr($this->getSubtableValue($subtable, $row, 'LEDGERACCOUNT'), 0, strpos($this->getSubtableValue($subtable, $row, 'LEDGERACCOUNT'), ' - ')) != '1416' || substr($this->getSubtableValue($subtable, $row, 'LEDGERACCOUNT'), 0, strpos($this->getSubtableValue($subtable, $row, 'LEDGERACCOUNT'), ' - ')) == '1411') {
        $performDate = DateTime::createFromFormat('Y-m-d', $this->getTableValue('invoice_performDate'))->format('dmY');
    }
    
    $costcenter = '';
    if ($datevMandant != '10220') {
        $costcenter = $this->getSubtableValue($subtable, $row, 'COMPANY').$this->getSubtableValue($subtable, $row, 'DIVISION').substr($this->getSubtableValue($subtable, $row, 'COSTCENTER'), 0, strpos($this->getSubtableValue($subtable, $row, 'COSTCENTER'), ' '));
    }


    $data = [
        str_replace('.',',',str_replace(',','',$this->getSubtableValue($subtable, $row, 'AMOUNT'))), //"Umsatz (ohne Soll/Haben-Kz)",
        "S", //"Soll/Haben-Kennzeichen",
        $this->getTableValue('invoice_currency'), //"WKZ Umsatz",
        "", //"Kurs",
        "", //"Basis-Umsatz",
        "", //"WKZ Basis-Umsatz",
        substr($this->getSubtableValue($subtable, $row, 'LEDGERACCOUNT'), 0, strpos($this->getSubtableValue($subtable, $row, 'LEDGERACCOUNT'), ' - ')), //"Konto",
        $this->getTableValue('invoice_creditorNr'), //"Gegenkonto (ohne BU-Schlüssel)",
        $this->getSubtableValue($subtable, $row, 'TAXKEY'), //"BU-Schlüssel",
        DateTime::createFromFormat('Y-m-d', $this->getTableValue('invoice_voucherDate'))->format('dm'), //"Belegdatum",
        "", //"Belegfeld 1",
        "", //"Belegfeld 2",
        "", //"Skonto",
        $this->getSubtableValue($subtable, $row, 'POSTINGTEXT'), //"Buchungstext",
        "", //"Postensperre",
        "", //"Diverse Adressnummer",
        "", //"Geschäftspartnerbank",
        "", //"Sachverhalt",
        "", //"Zinssperre",
        "", //"Beleglink",
        "", //"Beleginfo - Art 1",
        "", //"Beleginfo - Inhalt 1",
        "", //"Beleginfo - Art 2",
        "", //"Beleginfo - Inhalt 2",
        "", //"Beleginfo - Art 3",
        "", //"Beleginfo - Inhalt 3",
        "", //"Beleginfo - Art 4",
        "", //"Beleginfo - Inhalt 4",
        "", //"Beleginfo - Art 5",
        "", //"Beleginfo - Inhalt 5",
        "", //"Beleginfo - Art 6",
        "", //"Beleginfo - Inhalt 6",
        "", //"Beleginfo - Art 7",
        "", //"Beleginfo - Inhalt 7",
        "", //"Beleginfo - Art 8",
        "", //"Beleginfo - Inhalt 8",
        $costcenter, //"KOST1 - Kostenstelle",
        preg_replace('/\D/', '', $this->getTableValue('invoice_internalNr')), //"KOST2 - Kostenstelle",
        "", //"Kost-Menge",
        "", //"EU-Land u. UStID (Bestimmung)",
        "", //"EU-Steuersatz (Bestimmung)",
        "", //"Abw. Versteuerungsart",
        "", //"Sachverhalt L+L",
        "", //"Funktionsergänzung L+L",
        "", //"BU 49 Hauptfunktionstyp",
        "", //"BU 49 Hauptfunktionsnummer",
        "", //"BU 49 Funktionsergänzung",
        "D_Beleglink", //"Zusatzinformation - Art 1",
        'BEDI "' . $this->getTableValue('invoice_guid') . '"', //"Zusatzinformation- Inhalt 1",
        "", //"Zusatzinformation - Art 2",
        "", //"Zusatzinformation- Inhalt 2",
        "", //"Zusatzinformation - Art 3",
        "", //"Zusatzinformation- Inhalt 3",
        "", //"Zusatzinformation - Art 4",
        "", //"Zusatzinformation- Inhalt 4",
        "", //"Zusatzinformation - Art 5",
        "", //"Zusatzinformation- Inhalt 5",
        "", //"Zusatzinformation - Art 6",
        "", //"Zusatzinformation- Inhalt 6",
        "", //"Zusatzinformation - Art 7",
        "", //"Zusatzinformation- Inhalt 7",
        "", //"Zusatzinformation - Art 8",
        "", //"Zusatzinformation- Inhalt 8",
        "", //"Zusatzinformation - Art 9",
        "", //"Zusatzinformation- Inhalt 9",
        "", //"Zusatzinformation - Art 10",
        "", //"Zusatzinformation- Inhalt 10",
        "", //"Zusatzinformation - Art 11",
        "", //"Zusatzinformation- Inhalt 11",
        "", //"Zusatzinformation - Art 12",
        "", //"Zusatzinformation- Inhalt 12",
        "", //"Zusatzinformation - Art 13",
        "", //"Zusatzinformation- Inhalt 13",
        "", //"Zusatzinformation - Art 14",
        "", //"Zusatzinformation- Inhalt 14",
        "", //"Zusatzinformation - Art 15",
        "", //"Zusatzinformation- Inhalt 15",
        "", //"Zusatzinformation - Art 16",
        "", //"Zusatzinformation- Inhalt 16",
        "", //"Zusatzinformation - Art 17",
        "", //"Zusatzinformation- Inhalt 17",
        "", //"Zusatzinformation - Art 18",
        "", //"Zusatzinformation- Inhalt 18",
        "", //"Zusatzinformation - Art 19",
        "", //"Zusatzinformation- Inhalt 19",
        "", //"Zusatzinformation - Art 20",
        "", //"Zusatzinformation- Inhalt 20",
        "", //"Stück",
        "", //"Gewicht",
        "", //"Zahlweise",
        "", //"Forderungsart",
        "", //"Veranlagungsjahr",
        "", //"Zugeordnete Fälligkeit",
        "", //"Skontotyp",
        "", //"Auftragsnummer",
        "", //"Buchungstyp (Anzahlungen)",
        "", //"USt-Schlüssel (Anzahlungen)",
        "", //"EU-Land (Anzahlungen)",
        "", //"Sachverhalt L+L (Anzahlungen)",
        "", //"EU-Steuersatz (Anzahlungen)",
        "", //"Erlöskonto (Anzahlungen)",
        "", //"Herkunft-Kz",
        "", //"Buchungs GUID",
        "", //"KOST-Datum",
        "", //"SEPA-Mandatsreferenz",
        "", //"Skontosperre",
        "", //"Gesellschaftername",
        "", //"Beteiligtennummer",
        "", //"Identifikationsnummer",
        "", //"Zeichnernummer",
        "", //"Postensperre bis",
        "", //"Bezeichnung SoBil-Sachverhalt",
        "", //"Kennzeichen SoBil-Buchung",
        "", //"Festschreibung",
        $performDate, //"Leistungsdatum",
        "", //"Datum Zuord. Steuerperiode",
        "", //"Fälligkeit",
        "0", //"Generalumkehr (GU)",
        "", //"Steuersatz",
        "", //"Land",
        "", //"Abrechnungsreferenz",
        "", //"BVV-Position",
        "", //"EU-Land u. UStID (Ursprung)",
        "", //"EU-Steuersatz (Ursprung)",
        "", //"Abw. Skontokonto"
    ];
    $count = array_push($dataFile, $data); 
}

// Öffne die Datei zum Schreiben
$datei = fopen($this->getConfiguration('ExportPathCSV') . $this->getTableValue('invoice_companyNr') . ' ' . $this->getTableValue('invoice_companyName') . '\\' . $filename, "w");

// Überprüfe, ob die Datei erfolgreich geöffnet wurde
if ($datei !== false) {
    // Schreibe jede Zeile der Daten als CSV-Format
    foreach ($dataFile as $zeile) {
        fputcsv($datei, $zeile, ";"); // Verwende das Semikolon als Trennzeichen
    }
    // Schließe die Datei
    fclose($datei);
}

/*        //Export Beleg
$originalFilename = $this->getOriginalFilename('invoice_document', 0, '', true);
$filesystemFilename = $this->getFilesystemFilename($originalFilename);
$fullFilePath = $this->getFullUploadPath($filesystemFilename);

copy($fullFilePath, $this->getConfiguration('ExportPathCSV') . $this->getTableValue('invoice_companyNr') . ' ' . $this->getTableValue('invoice_companyName') . '\\' . $this->getTableValue('invoice_internalNr') . '_' . substr($this->getTableValue('invoice_creditorName'), strpos($this->getTableValue('invoice_creditorName'), ' ')+1) . '.' . pathinfo($filesystemFilename, PATHINFO_EXTENSION)); //basename($filesystemFilename));
*/