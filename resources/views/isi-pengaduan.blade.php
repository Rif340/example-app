<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengaduan Masyarakat</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      display: flex;
      padding: 0 10px;
      min-height: 100vh;
      background: #0D6EFD;
      align-items: center;
      justify-content: center;
    }

    ::selection {
      color: #fff;
      background: #0D6EFD;
    }

    .wrapper {
      width: 715px;
      background: #F7F6FB;
      border-radius: 5px;
      box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.05);
    }

    textarea {
            width: 100%;
            height: auto;
            min-height: 10px; /* Atur ukuran minimum */
            resize: none;
        }

    .wrapper header {
      font-size: 22px;
      font-weight: 600;
      padding: 20px 30px;
      border-bottom: 1px solid #ccc;
    }

    .wrapper form {
      margin: 35px 30px;
    }

    .wrapper form.disabled {
      pointer-events: none;
      opacity: 0.7;
    }

    form .dbl-field {
      display: flex;
      margin-bottom: 25px;
      justify-content: space-between;
    }

    .dbl-field .field {
      height: 50px;
      display: flex;
      position: relative;
      width: calc(100% / 2 - 13px);
    }

    .wrapper form i {
      position: absolute;
      top: 50%;
      left: 18px;
      color: #ccc;
      font-size: 17px;
      pointer-events: none;
      transform: translateY(-50%);
    }

    form .field input,
    form .message textarea {
      width: 100%;
      height: 100%;
      outline: none;
      padding: 0 18px 0 48px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .field input::placeholder,
    .message textarea::placeholder {
      color: #ccc;
    }

    .field input:focus,
    .message textarea:focus {
      border: 2px solid #0D6EFD;
    }

    .field input:focus~i,
    .message textarea:focus~i {
      color: #0D6EFD;
    }

    form .message {
      position: relative;
    }

    form .message i {
      top: 30px;
      font-size: 20px;
    }

    form .message textarea {
      min-height: 10px;
      max-width: 100%;
      min-width: 100%;
      padding: 5px;
    }

    form .message textarea::-webkit-scrollbar {
      width: 0px;
    }

    .message textarea:focus {
      padding-top: 14px;
    }

    form .button-area {
      margin: 25px 0;
      display: flex;
      align-items: center;
    }

    .button-area button {
      color: #fff;
      border: none;
      outline: none;
      font-size: 18px;
      cursor: pointer;
      border-radius: 5px;
      padding: 13px 25px;
      background: hsl(171, 100%, 41%);
      transition: background 0.3s ease;
    }

    .button-area button:hover {
      background: #025ce3;
    }

    .button-area span {
      font-size: 17px;
      margin-left: 30px;
      display: none;
    }

    @media (max-width: 600px) {
      .wrapper header {
        text-align: center;
      }

      .wrapper form {
        margin: 35px 20px;
      }

      form .dbl-field {
        flex-direction: column;
        margin-bottom: 0px;
      }

      form .dbl-field .field {
        width: 100%;
        height: 45px;
        margin-bottom: 20px;
      }

      form .message textarea {
        resize: none;
      }

      form .button-area {
        margin-top: 20px;
        flex-direction: column;
      }

      .button-area button {
        width: 100%;
        padding: 11px 0;
        font-size: 16px;
      }

      .button-area span {
        margin: 20px 0 0;
        text-align: center;
      }
    }
  </style>
  <title>Pengaduan Masyarakat</title>
</head>

<body>
  @include('layouts.sidebar')
    

  <div style="margin-top: 80px">
    <div style="width: 100vh;height:10vh;background-color:white;color:#025ce3;">
      <h1><span></span></h1>
    </div>
  </div>
  <div class="wrapper">
    <header>Send us a Message</header>
    <form  action="isi-pengaduan" method="post" enctype="multipart/form-data">
    @method('post')
        @csrf
      <div class="dbl-field">
        <h5>Upload Disini :</h5>
        <input type="file" name="foto">
      </div>
      <div class="message">
        <h5>Isi Disini :</h5>
        <textarea oninput="autoExpand(this)" name="isi_laporan" required></textarea>
      </div>
      <div class="button-area">
        <button type="submit">Send Message</button>
      </div>
    </form>
  </div>

  <script>
    function autoExpand(element) {
            element.style.height = "auto";
            element.style.height = (element.scrollHeight) + "px";
        }

    const dynamicText = document.querySelector("h1 span");
    const words = ["Halo.... {{Auth::user()->username}}", "Apakah Ada Keluhan.?", "Masukan Keluhan Anda Disini.!", "Terimakasih ^_^"];
    // Variables to track the position and deletion status of the word
    let wordIndex = 0;
    let charIndex = 0;
    let isDeleting = false;
    const typeEffect = () => {
      const currentWord = words[wordIndex];
      const currentChar = currentWord.substring(0, charIndex);
      dynamicText.textContent = currentChar;
      dynamicText.classList.add("stop-blinking");
      if (!isDeleting && charIndex < currentWord.length) {
        // If condition is true, type the next character
        charIndex++;
        setTimeout(typeEffect, 200);
      } else if (isDeleting && charIndex > 0) {
        // If condition is true, remove the previous character
        charIndex--;
        setTimeout(typeEffect, 100);
      } else {
        // If word is deleted then switch to the next word
        isDeleting = !isDeleting;
        dynamicText.classList.remove("stop-blinking");
        wordIndex = !isDeleting ? (wordIndex + 1) % words.length : wordIndex;
        setTimeout(typeEffect, 1200);
      }
    }
    typeEffect();
  </script>
</body>

</html>