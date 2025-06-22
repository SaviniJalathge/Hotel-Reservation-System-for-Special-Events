//api call
function signIn() {
    var email = document.getElementById("user-email").value;
    var pass = document.getElementById("user-pass").value;
    
    const formData = new FormData();
    formData.append("email", email);
    formData.append("pass", pass);

    fetch("http://localhost/app/project/signin_be.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        alert("Form submitted: " + data);
        window.location.href="./admin_experience.php";
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  }
  