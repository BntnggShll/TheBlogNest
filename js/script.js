document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.getElementById("loginForm");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const emailError = document.getElementById("emailError");
    const passwordError = document.getElementById("passwordError");
  
    loginForm.addEventListener("submit", async function (e) {
      e.preventDefault(); // Cegah reload
  
      // Reset pesan error
      emailError.style.display = "none";
      passwordError.style.display = "none";
  
      const email = emailInput.value.trim();
      const password = passwordInput.value.trim();
      let valid = true;
  
      // Validasi form
      if (email === "") {
        emailError.style.display = "block";
        valid = false;
      }
      if (password === "") {
        passwordError.style.display = "block";
        valid = false;
      }
  
      if (!valid) return;
  
      try {
        const response = await fetch("php/login.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          body: new URLSearchParams({
            email: email,
            password: password,
          }),
        });
  
        const result = await response.text();
  
        if (response.ok) {
          if (result === "success") {
            alert("Login berhasil!");
            window.location.href = "index.html"; // Ganti sesuai kebutuhan
          } else {
            alert("Login gagal: " + result);
          }
        } else {
          alert("Terjadi kesalahan server.");
        }
      } catch (error) {
        console.error("Error:", error);
        alert("Gagal menghubungi server.");
      }
    });
  });
  