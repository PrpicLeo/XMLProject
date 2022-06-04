<!DOCTYPE html>
<html>
<head>
  <style>
    table,th,td {
      border : 1px solid black;
      border-collapse: collapse;
    }
    th,td {
      padding: 5px;
    }
    body{
      max-width: 100%;
      width: 1000px;
      margin: 0 auto;
      background-color: wheat;
      font-family: 'Big Shoulders Stencil Text', cursive;
    }
    li:hover {
      opacity: 0.5;
      background-color:wheat;
      color: red;
    }    
    ul {
      display: flex;
      list-style-type: none;
      flex-direction: row;
      justify-content: space-between;
    }
    ul li {
      width:20%;
      display: flex;
      border-style: solid;
      border-color: rgb(32, 32, 31);
      box-shadow: 5px 5px 30px  #05235c;
    }
    ul li input {
      width:100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    nav {
      max-width: 960px;
      margin:-10px 0px 10px 0px;
    }
    input {
      border-style: none;
      background-color: #05355c; 
      color:white; 
                }
    button {
      width:100%;
      padding: 20px 0px;
      border-style: none;
      background-color: #05355c;
      font-size: 30px;
      border-radius: 20px;   
      color:white; 
    }
    button:hover {
      background-color:#91392e;  
      transition: 0.5s linear;
        
    }
    #lijevo, #desno {
      padding: 20px 20px;
      border-style: none;
      background-color: #05355c;
      border-radius: 20px;   
      color:white;
    }
    ol {
      background-color: lightblue;
      width:100%;
      text-align:center;
      border-radius: 20px;  
    }    
  </style>
</head>
<body>

  <ol id = "txt">IMATE 4 OPCIJE:
    <li>ODABIR BOJE</li>
    <li>PROMJENA BOJE</li>
    <li>XML TABLICA</li>
    <li>XML LISTA</li>
  </ol>

  <header>
    <nav>
      <ul>
        <li><input type="color" id="boja" ></input></li>
        <li><input type="button" onclick="stranica()" id="prvi" value="Promijeni boju stranice"></input></li>
        <li><input type="button" onclick="tablica()" id="drugi" value="Promijeni boju tablice"></input></li>
        <li><input type="button" onclick="text()" id="treci" value="Promijeni boju teksta"></input></li>
      </ul>
    </nav>
  </header>

  <button type="button" onclick="ucitajXML()">Stvori tablicu filmova</button>
  <br><br>
  <table id="tablica"></table>
  <br><br>
  <div id='movie'></div><br>
  <input type="button" id="lijevo" onclick="prethodni()" value="PRETHODNO">
  <input type="button" onclick="slijedeci()" id="desno" value="SLIJEDEĆE">
  <br><br>

  <script>
    function tablica(){
      var d = document.getElementById("boja").value;
      var polje = document.getElementById("tablica");
      if (movie = true){
        polje.style.backgroundColor = d;
      }
    }

    function stranica(){
      var y = document.getElementById("boja").value;
      var polje2 = document.getElementById("tijelo");
      if (movie = true){
        document.body.style.backgroundColor = y;
      }
    }

    function text(){
      var z = document.getElementById("boja").value;
      var polje3 = document.getElementById("txt");
      if (txt = true){
        polje3.style.color = z;
      }
    }
    
    var a = 0;
    var b;
    vidi(a);

    function vidi(a) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        listaXML(this, a);
      }
    };
      xmlhttp.open("GET", "filmovi.xml", true);
      xmlhttp.send();
    }

      function listaXML(xml, a) {
        var xmlDoc = xml.responseXML; 
        b = xmlDoc.getElementsByTagName("FILM");
        document.getElementById("movie").innerHTML = "Naziv: " +
        b[a].getElementsByTagName("NAZIV")[0].childNodes[0].nodeValue + "<br>Redatelj: " +
        b[a].getElementsByTagName("REDATELJ")[0].childNodes[0].nodeValue + "<br>Scenarist: " + 
        b[a].getElementsByTagName("SCENARIST")[0].childNodes[0].nodeValue + "<br>Glumci: " + 
        b[a].getElementsByTagName("GLUMCI")[0].childNodes[0].nodeValue + "<br>Godina: " + 
        b[a].getElementsByTagName("GODINA")[0].childNodes[0].nodeValue + "<br>Trajanje: " + 
        b[a].getElementsByTagName("TRAJANJE")[0].childNodes[0].nodeValue + "<br>Žanr: " + 
        b[a].getElementsByTagName("ZANR")[0].childNodes[0].nodeValue + "<br>Ocjena: " + 
        b[a].getElementsByTagName("OCJENA")[0].childNodes[0].nodeValue + "<br>Popularnost: " + 
        b[a].getElementsByTagName("POPULARNOST")[0].childNodes[0].nodeValue;
      }

      function slijedeci() {
        if (a < b.length-1) {
          a++;
          vidi(a);
        }
      }

      function prethodni() {
        if (a > 0) {
          a--;
          vidi(a);
        }
      }

      function ucitajXML() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          tablicaXML(this);
        }
        };
        xmlhttp.open("GET", "filmovi.xml", true);
        xmlhttp.send();
      }
      
      function tablicaXML(xml) {
        var k;
        var odgovor = xml.responseXML;
        var table="<tr><th>NAZIV</th><th>REDATELJ</th><th>SCENARIST</th><th>GLUMCI</th><th>GODINA</th><th>TRAJANJE</th><th>ŽANR</th><th>OCJENA</th><th>POPULARNOST</th></tr>";
        var j = odgovor.getElementsByTagName("FILM");
        for (k = 0; k <j.length; k++) { 
          table += "<tr><td>" +
          j[k].getElementsByTagName("NAZIV")[0].childNodes[0].nodeValue + "</td><td>" +   
          j[k].getElementsByTagName("REDATELJ")[0].childNodes[0].nodeValue + "</td><td>" +  
          j[k].getElementsByTagName("SCENARIST")[0].childNodes[0].nodeValue + "</td><td>" +
          j[k].getElementsByTagName("GLUMCI")[0].childNodes[0].nodeValue + "</td><td>" +
          j[k].getElementsByTagName("GODINA")[0].childNodes[0].nodeValue + "</td><td>" +
          j[k].getElementsByTagName("TRAJANJE")[0].childNodes[0].nodeValue + "</td><td>" +
          j[k].getElementsByTagName("ZANR")[0].childNodes[0].nodeValue + "</td><td>" +
          j[k].getElementsByTagName("OCJENA")[0].childNodes[0].nodeValue + "</td><td>" +
          j[k].getElementsByTagName("POPULARNOST")[0].childNodes[0].nodeValue + "</td></tr>";
        }
        document.getElementById("tablica").innerHTML = table;
      }
</script>
</body>
</html>
