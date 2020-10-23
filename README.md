# Social Media Bar - Extension for Contao 4.x

Erweiterung für Contao 4 Systeme für eine einfach zu pflegende Social Media Bar mit Ausgabemöglichkeit eines Ansprechpartners.

##

### Installation

```
$ composer require agentur1601com/social-media-bar
```

##

### Konfiguration der Social Media Bar

* Nach der Installation wurde ein neuer Punkt "Social Media" in Contao ergänzt
* Unter diesem muss zuerst eine neue Social Media Bar angelegt werden (Hier kann außerdem ausgewählt werden ob ein Ansprechpartner ausgegeben werden soll)
* Unter Theme Einstellungen kann ein Theme für die Social Media Bar ausgewählt werden (light / dark)
* Anschließend kann die Social Media Bar bearbeitet und es können beliebig viele Social Media Elemente erstellt werden
  * Für die Vordefinierten Social Media Anbieter wird standardmäßig ein weißes Icon ausgegeben, welches aber über das custom Icon überschrieben werden kann
  * Über den Punkt Sonstige können zu den vordefineirten social media Anbietern weitere hinzugefügt werden
  * Die Reihenfolge der Elemente kann per Drag&Drop angepasst werden
* Anscließend muss noch das zugehörige Frontend Modul angelegt und im entsprechenden Seitenlayout hinterlegt werden

### Ansprechpartner ausgeben

* Um das Ansprechpartner Element nutzen zu können muss hierfür der Haken in der Social Media Bar gesetzt sein
* In den Mitglieder Einstellungen kann nun für das gewünschte Mitglied die Seiten ausgewählt werden, auf denen dieses als Ansprechpartner ausgegeben werden soll
* Außerdem kann hier auch noch ein Bild und eine genauere Beschriebeung der Person ergänzt werden
* Der Ansprechpartner wird standardmäßig unterhalb der social media Elemente ausgegeben
