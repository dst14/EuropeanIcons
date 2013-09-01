<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <title>EuropeanIcons Template</title>
</head>
<body>
<h3>EuropeanIcons Template</h3>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <title>ELUblog Template</title>
</head>
<body>
<h3>ELUblog Template</h3>

NAME - Name des Werks
ORIGINALNAME - „Original“
TRANSLATEDNAME - Dt. Übersetzung
AUTHOR - Name des Urhebers
IMAGE - Bilddatei
TECHNIQUE - Technik der Arbeit
SIZE - Format
YEAR - Entstehungsjahr
PLACE - Entstehungsort
COUNTRY - Entstehungsland
OWNER Besitzende Institution und Institutionslink
COMMONS - Link zu einem Commons-Bestand (Web-Repositorium mit einer freien Bild-Datei, etwa Wikimedia-Commons oder
Europeana)
COMMENTS - Bemerkungen
ICONSLINK - Link in Singleansicht


<h2>Listenansicht</h2>

<!-- ###LISTVIEW### begin -->
<!-- ###ITEM### -->
<div class="ei_icon">
    <div class="ei_image">###IMAGE###</div>
    <div class="ei_data">
        <div class="ei_maintitle">###NAME###</div>
        <div class="ei_subtitle">###ORIGNALNAME### (###TRANSLATED NAME###)</div>
        <div class="ei_info">###YEAR### ###COUNTRY###</div>
    </div>
</div>
<div class="spacer"></div>
<!-- ###ITEM### -->
<!-- ###LISTVIEW### end -->

<h2>Einzelansicht</h2>

<!-- ###SINGLEVIEW### begin -->
<div class="icons-iconswrap">
    <div class="icons-iconimage">
        ###ICONIMAGE###
    </div>
    <div class="icons-icondescription">
        <h1 class="icons-icontitle">###ICONTITLE###</h1>

        <div class="icons-data">
            <p><span class="origtitle">###ICONORIGTITLE###</span></p>

            <p>von ###ICONAUTHOR### (###ICONYEAR###, ###ICONPLACE###, ###ICONCOUNTRY###)<br>
                ###ICONTECHNIQUE###, ###ICONSIZE###<br>
                ###ICONOWNER###</p>

            <p class="icons-comment">###ICONCOMMENT###</p>

            <p>###ICONLITERATURE###</p>

            <p class="icons-backlink">###BACKLINK###</p>
        </div>


        <div class="icons-occurences">
            <h2>###OCCHEAD###</h2>
            ###OCCURENCES###
        </div>
        <div class="icons-backlink">###BACKLINK###</div>

    </div>
</div>
<!-- ###SINGLEVIEW### end -->

<h2> Listenansicht der Fundstellen</h2>

<!-- ###OCCLISTVIEW### begin -->
<div class="icons-occwrap-###EVENODD###">
    <div class="occ-data">
        <div class="occ-bookdata">
            <b>###OCCTITLE###</b> (von ###OCCAUTHORS###)<br>
            ###OCCPUBLISHER###: ###OCCPUBLPLACE### (###OCCCOUNTRY###), ###OCCPUBLYEAR###.
            (###OCCREPR###, 1. Aufl.: ###OCCFIRSTPUBL###)
        </div>
        <div class="occ-occdata">
            <p>Abgebildet ###OCCPAGE### (###OCCPOSINBOOK###, ###OCCCONTEXT###, ###OCCCROP###, ###OCCSIZEOFIMG###,
                ###OCCREPRO###).
                ###OCCADDITIONAL###</p>
            ###OCCNACHWEIS### ###OCCMORELINK### ###OCCLIBLINK###
        </div>
    </div>
</div>
<!-- ###OCCLISTVIEW### end -->

<h2>Listenansicht der Bilder</h2>

<!-- ###ICONLISTVIEW### begin -->
<
<div class="icons-iconswrap">
    <div class="icons-iconimage">
        ###ICONIMAGE###
    </div>
    <div class="icons-icondescription">
        <div class="icons-icontitle">###ICONTITLE###</div>
        <div class="icons-data">
            <p><span class="origtitle">###ICONORIGTITLE###</span></p>

            <p>###ICONAUTHOR###, ###ICONYEAR###</p>
        </div>
        <div class="icons-backlink">###ICONLINK###</div>
    </div>
</div>
<!-- ###ICONLISTVIEW### end -->

</body>
</html>

