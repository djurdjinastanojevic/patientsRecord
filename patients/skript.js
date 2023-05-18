function ucitajTabelu(drzava)
{
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function ()
    {
        if(this.readyState==4 && this.status==200) {
            var tabela = document.getElementById("tabela");
            tabela.innerHTML = this.responseText;
            console.log(this.responseText);
        }
    }
    xhr.open("POST","/ispisTabele.php");
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send("drzava=" + drzava);
}
window.onload = function ()
{
    ucitajTabelu("");
}
function addbtnClick()
{
    window.location = "dodajPacijenta.php";
}
function resetBtnClick()
{
    var name = document.getElementById("firstName");
    name.value = "";
    var last = document.getElementById("lastName");
    last.value = "";
    var date = document.getElementById("birthDate");
    date.value = "";
    var country = document.getElementById("country");
    country.value = "";

}
function red()
{
    var radio = document.getElementById("InfectedYes");
    var dugme = document.getElementById("add");
    if(radio.checked)
    {
        dugme.style.backgroundColor = "red";
    }
}
function gray()
{
    var radio = document.getElementById("InfectedNo");
    var dugme = document.getElementById("add");
    if(radio.checked)
    {
        dugme.style.backgroundColor = "lightgray";
    }
}
