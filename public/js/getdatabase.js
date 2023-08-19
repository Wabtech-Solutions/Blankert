function showCustomer(str) {
  if (str == "") {
    document.getElementById("txtHint").value = "";
    return;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("txtHint").innerHTML = this.responseText;
  }
  xhttp.open("GET", "getcustomer.php?q="+str);
  xhttp.send();
}

function loadXMLdoc(dname)
{
  if (window.XMLHttpRequest)
  {
    xhttp=new XMLHttpRequest();
  }
  else
  {
    xhttp=new ActiveXObject("microsoft.XMLHTTP")
  }
  xhttp.open("GET", dname,false);
  xhttp.send();
  return xhttp.responseXML;
}

function searchXML()
{
  xmlDoc = loadXMLdoc("feed.xml");
  x = xmlDoc.getElementsByTagName("id")
  input = document.getElementById("brow2").value;

  size = input.length;
  if (input == null || input == "")
  {
    document.getElementById("results").innerHTML= "Vul de ID van de auto in!";
    return false;
  }
  for (i=0;i<x.length;i++)
  {
    id = xmlDoc.getElementsByTagName("id")[i].childNodes[0].nodeValue;
    startString = id.substring(0,size);
    if (startString.toLowerCase() == input.toLowerCase())
    {
      id=xmlDoc.getElementsByTagName("id")[i].childNodes[0].nodeValue;
      startString = input.substring(0,size);
      Merk=xmlDoc.getElementsByTagName("Merk")[i].childNodes[0].nodeValue;
      uitvoering=xmlDoc.getElementsByTagName("Uitvoering")[i].childNodes[0].nodeValue;
      Type=xmlDoc.getElementsByTagName("Type")[i].childNodes[0].nodeValue;
      Afbeelding=xmlDoc.getElementsByTagName("Afbeelding")[i].childNodes[0].nodeValue;
      Transmissie=xmlDoc.getElementsByTagName("Transmissie")[i].childNodes[0].nodeValue;
      Bijtelling=xmlDoc.getElementsByTagName("Bijtelling")[i].childNodes[0].nodeValue;
      link=xmlDoc.getElementsByTagName("URL")[i].childNodes[0].nodeValue;
      Brandstof=xmlDoc.getElementsByTagName("Brandstof")[i].childNodes[0].nodeValue;
      FiscaleWaarde=xmlDoc.getElementsByTagName("FiscaleWaarde")[i].childNodes[0].nodeValue;
      divText = '<h1 class="cartitle" >' + Merk + " " + Type + " " + uitvoering + "</h1>" + '<br>' + '<img class="ofimg" src="' + Afbeelding + '">'
      + '<div class="carinfo"> <p class="infoblock" style="font-size: 14px; text-decoration: underline;"> Informatie: </p> <p> Brandstof: <b>' + Brandstof + '</b></p>' + '<p> Transmissie: <b>' + Transmissie + '</b></p>' +  '<p> Fiscale waarde (indicatief): <b>' + '€ '+  FiscaleWaarde + '</b></p>' +  '<p> Bijtelling: <b>' + Bijtelling +'</b></p> </div>' 
      ;
      break;
    }
    else{
      divText = '<h>Auto niet gevonden.</h2>';
    }
  }
  document.getElementById("results").innerHTML = divText;
  document.getElementById("carLink").innerHTML = '<a href="' + link + '"> <div class="bekijk">Meer informatie en opties</div> </a>';
}

function searchXML2()
{
  xmlDoc = loadXMLdoc("feed.xml");
  x = xmlDoc.getElementsByTagName("id")
  input = document.getElementById("brow3").value;

  size = input.length;
  if (input == null || input == "")
  {
    document.getElementById("results2").innerHTML= "Vul de ID van de auto in!";
    return false;
  }
  for (i=0;i<x.length;i++)
  {
    id = xmlDoc.getElementsByTagName("id")[i].childNodes[0].nodeValue;
    startString = id.substring(0,size);
    if (startString.toLowerCase() == input.toLowerCase())
    {
      id=xmlDoc.getElementsByTagName("id")[i].childNodes[0].nodeValue;
      startString = input.substring(0,size);
      Merk=xmlDoc.getElementsByTagName("Merk")[i].childNodes[0].nodeValue;
      uitvoering=xmlDoc.getElementsByTagName("Uitvoering")[i].childNodes[0].nodeValue;
      Type=xmlDoc.getElementsByTagName("Type")[i].childNodes[0].nodeValue;
      Afbeelding=xmlDoc.getElementsByTagName("Afbeelding")[i].childNodes[0].nodeValue;
      Transmissie=xmlDoc.getElementsByTagName("Transmissie")[i].childNodes[0].nodeValue;
      Bijtelling=xmlDoc.getElementsByTagName("Bijtelling")[i].childNodes[0].nodeValue;
      link=xmlDoc.getElementsByTagName("URL")[i].childNodes[0].nodeValue;
      Brandstof=xmlDoc.getElementsByTagName("Brandstof")[i].childNodes[0].nodeValue;
      FiscaleWaarde=xmlDoc.getElementsByTagName("FiscaleWaarde")[i].childNodes[0].nodeValue;
      divText = '<h1 class="cartitle" >' + Merk + " " + Type + " " + uitvoering + "</h1>" + '<br>' + '<img class="ofimg" src="content/autos/' + id + '.jpg">'
      + '<div class="carinfo"> <p class="infoblock"> Informatie: </p> <p> Brandstof: <b>' + Brandstof + '</b></p>' + '<p> Transmissie: <b>' + Transmissie + '</b></p>' +  '<p> Fiscale waarde (indicatief): <b>' + '€ '+  FiscaleWaarde + '</b></p>' +  '<p> Bijtelling: <b>' + Bijtelling +'</b></p> </div>' 
      ;
      break;
    }
    else{
      divText = '<h>Auto niet gevonden.</h2>';
    }
  }
  document.getElementById("results2").innerHTML = divText;
  document.getElementById("carLink2").innerHTML = '<a href="' + link + '"> <div class="bekijk">Meer informatie en opties</div> </a>';
}