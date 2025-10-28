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

function sessionMsg() {
  const msg = document.querySelector(".session");
  if (msg) {
    console.log("success message is available.");
    setTimeout(() => {
      msg.remove();
    }, 3000);
  } else {
    console.warn("no session message available yet.");
  }
}

function submitOtp() {
  const otp = document.querySelector(".otp");
  const form = document.querySelector(".form");
  const verify = document.querySelector(".verify");

  if (!otp || !form || !verify) {
    console.warn("One or more elements not found: .otp, .form, .verify");
    return;
  }

  otp.addEventListener("input", () => {
    if (otp.value.length == 4) {
      form.submit();
      verify.textContent = "verifying....";
      otp.readOnly = true;
    }
  });
}

window.addEventListener("load", () => {
  regValidation();
  loginValidation();
  sessionMsg();
  submitOtp();
});
