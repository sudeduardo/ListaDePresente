function getLista(id) {
    $.get('./ajax/ajax.php', {id: id}, function (data) {
        data = JSON.parse(data);
        $("#dados").html(data.usuario.nome + "<br>" + moment(data.usuario.data_cadastro).format("DD/MM/YYYY"));
        $("#foto").attr('src', 'img/' + data.usuario.foto);
        var item = data.itens;
        if (item.length === 0) {
            $("#presentes").html("");
            $("#presentes").html("<h4 class='center'>Não há presentes associados a está pessoa</h4>");

        } else {
            $("#presentes").html("");
            for (var i = 0; i < item.length; i++) {
                console.log(item);
                if ((i + 1) % 3 === 0) {
                    $("#presentes").append("<div class='row'><div  class='col s12 m6 l4'>" +
                            "<div class='card small'>" +
                            "<div class='card-image waves-effect waves-block waves-light'>" +
                            " <img class='activator' src='img/" + item[i].foto + "'>" +
                            "</div>" +
                            "<div class='card-content'>" +
                            "<span class='card-title activator grey-text text-darken-4'>" + item[i].nome + "<i class='material-icons right'>more_vert</i></span>" +
                            "</div>" +
                            "<div class='card-reveal center'>" +
                            "<span class='card-title grey-text text-darken-4'>" + item[i].nome + "<i class='material-icons right'>close</i></span>" +
                            "<p> Descricão: " + item[i].descricao + "</p><p> <a href='" + item[i].link + "'>Link</a></p></div></div>");


                } else if ((i + 1) % 3 === 1) {
                    $("#presentes").append("<div  class='col s12 m6 l4'>" +
                            "<div class='card small'>" +
                            "<div class='card-image waves-effect waves-block waves-light'>" +
                            " <img class='activator' src='img/" + item[i].foto + "'>" +
                            "</div>" +
                            "<div class='card-content'>" +
                            "<span class='card-title activator grey-text text-darken-4'>" + item[i].nome + "<i class='material-icons right'>more_vert</i></span>" +
                            "</div>" +
                            "<div class='card-reveal center'>" +
                            "<span class='card-title grey-text text-darken-4'>" + item[i].nome + "<i class='material-icons right'>close</i></span>" +
                            "<p> Descricão: " + item[i].descricao + "</p><p> <a href='" + item[i].link + "'>Link</a></p></div></div></div>");
                } else {

                    $("#presentes").append("<div  class='col s12 m6 l4'>" +
                            "<div class='card small'>" +
                            "<div class='card-image waves-effect waves-block waves-light'>" +
                            " <img class='activator' src='img/" + item[i].foto + "'>" +
                            "</div>" +
                            "<div class='card-content'>" +
                            "<span class='card-title activator grey-text text-darken-4'>" + item[i].nome + "<i class='material-icons right'>more_vert</i></span>" +
                            "</div>" +
                            "<div class='card-reveal center'>" +
                            "<span class='card-title grey-text text-darken-4'>" + item[i].nome + "<i class='material-icons right'>close</i></span>" +
                            "<p> Descricão: " + item[i].descricao + "</p><p> <a href='" + item[i].link + "'>Link</a></p></div></div>");


                }
            }
        }
    });
}
$(document).ready(function () {
    $("#pesquisa").on("keyup", function () {
        var pesquisa = $(this).val();
        $.get("./ajax/pesquisa.php", {nome: pesquisa}, function (data) {
            data = JSON.parse(data);
            $("#nomes").html("");
            for (var i = 0; i < data.length; i++) {

                $("#nomes").append("<a href='#!' class='collection-item' id='" + data[i].id + "' onclick='getLista(this.id)'>" + data[i].nome + "<div class='secondary-content'><i class='material-icons'>send</i></div></a>");
            }
        });

    });
});
  