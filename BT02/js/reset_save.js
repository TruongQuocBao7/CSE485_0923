function resetValue(fullname, email, gender, current_group, mobiel, birthday) {
    document.querySelector('input[name="fullname"]').value = fullname;
    document.querySelector('input[name="email"]').value = email;
    document.querySelector('input[name="gender"]').value = gender;
    document.querySelector('input[name="current_group"]').value = current_group;
    document.querySelector('input[name="mobiel"]').value = mobiel;
    document.querySelector('input[name="birthday"]').value = birthday;
}

function saveValue(x) {
    var id = x;
    var fullname = document.querySelector('input[name="fullname"]').value;
    var email = document.querySelector('input[name="email"]').value;
    var gender = document.querySelector('input[name="gender"]').value;
    var current_group = document.querySelector('input[name="current_group"]').value = current_group;
    var mobiel = document.querySelector('input[name="mobiel"]').value = mobiel;
    var birthday = document.querySelector('input[name="birthday"]').value = birthday;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log("Dữ liệu đã được lưu thành công!");
        }
    };
    xhttp.open("POST", "reset_save.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("&id=" + id
        + "&fullname=" + fullname
        + "&email=" + email
        + "&gende=" + gender
        + "&current_group=" + current_group
        + "&mobiel=" + mobiel
        + "&birthday=" + birthday);
}