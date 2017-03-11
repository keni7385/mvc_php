
window.onload = function(e) {
    var form = document.getElementById("textInsert");
    console.log(form);

    form.onsubmit = function (e) {
        var url = "dashboard/xhrinsert";
        var data = "testo=" + document.getElementById("testo").value;

        var xmlhttp;
        if(window.XMLHttpRequest)
            xmlhttp = new XMLHttpRequest();
        else 
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        
        xmlhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
            }
        }
        xmlhttp.open("POST", url, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(data);

        return false;
    };
};