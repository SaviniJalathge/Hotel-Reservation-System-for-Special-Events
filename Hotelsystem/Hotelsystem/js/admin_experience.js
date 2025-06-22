//api call
function submitFormData() {
    var title = document.getElementById("title").value;
    var description = document.getElementById("description").value;
    var date = document.getElementById("date").value;
    var photo = document.getElementById("photo");
  
    var imgArray = [];
    var files = photo.files;
    for (var x = 0; x < files.length; x++) {
      imgArray.push(files[x]);
    }
  
    const formData = new FormData();
    formData.append("title", title);
    formData.append("description", description);
    formData.append("date", date);
  
    for (var i = 0; i < imgArray.length; i++) {
      formData.append("images[]", imgArray[i]);
    }
  
    fetch("http://localhost/app/project/admin_experience_be.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        alert("Form submitted: " + data);
        window.location.reload();
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  }
  