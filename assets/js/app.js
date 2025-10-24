function regValidation() {
  const userName = document.querySelector(".uname");
  const password = document.querySelector(".pwd");
  const email = document.querySelector(".mail");
  const msg = document.querySelector(".msg");
  const btn = document.querySelector(".Register");
  const form = document.querySelector(".form");
  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  form.addEventListener("submit", (e) => {
    if (userName.value == "" || password.value == "" || email.value == "") {
      msg.textContent = "please fill in all fields";
      e.preventDefault();
      setTimeout(() => {
        msg.textContent = "";
      }, 2800);
    } else if (!emailPattern.test(email.value)) {
      msg.textContent = "Enter a valid email";
      e.preventDefault();
      setTimeout(() => {
        msg.textContent = "";
      }, 2800);
    } else if (password.value.length < 8) {
      msg.textContent = "password has to be more than 8 characters";
      e.preventDefault();
      setTimeout(() => {
        msg.textContent = "";
      }, 2800);
    } else {
      btn.textContent = "Registering ....";
    }
  });
}

function loginValidation() {
  const msg = document.querySelector(".msg");
  const email = document.querySelector(".mail");
  const password = document.querySelector(".pwd");
  const form = document.querySelector(".form");
  const btn = document.querySelector(".login");
  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  form.addEventListener("submit", (e) => {
    if (password.value == "" || email.value == "") {
      msg.textContent = "please fill in all fields";
      e.preventDefault();
      setTimeout(() => {
        msg.textContent = "";
      }, 2800);
    } else if (!emailPattern.test(email.value)) {
      msg.textContent = "Enter a valid email";
      e.preventDefault();
      setTimeout(() => {
        msg.textContent = "";
      }, 2800);
    } else if (password.value.length < 8) {
      msg.textContent = "password has to be more than 8 characters";
      e.preventDefault();
      setTimeout(() => {
        msg.textContent = "";
      }, 2800);
    } else {
      btn.textContent = "logging in....";
    }
  });
}

window.addEventListener("load", () => {
  regValidation();
  loginValidation();
});
