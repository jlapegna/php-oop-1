// TODO NOW:
// generare classe Configurazione e inizializzare un oggetto per ogni configurazione, come visto in classe


console.log('Hello World');

function targetReset() {

  var target = $("#container");
  target.html('');
}

function printConfig(configurazioni){

    targetReset();

  var target = $("#container");

  var template = $("#box-template").html();
  var compiled = Handlebars.compile(template);

  for(var i = 0; i < configurazioni.length;i++){

    var config = configurazioni[i];
    var compiledCD = compiled(config);
    $("#container").append(compiledCD);

  }
}

function getData(){

  $.ajax({

    url: "getAllConfig.php",
    method: "GET",
    success: function(data) {

      printConfig(data);

    },
    error: function(error) {

      console.log("error", error);
    }
  })

}

function init (){

  getData();
}

$(window). ready(init);
