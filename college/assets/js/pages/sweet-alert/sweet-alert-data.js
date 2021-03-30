 $(function () {
  $(".btn-sweetalert button").on("click", function () {
    var type = $(this).data("type");
    if (type === "dialog1") {
      showDialog1();
    } else if (type === "dialog2") {
      showDialog2();
    } else if (type === "dialog3") {
      showDialog3();
    } else if (type === "dialog4") {
      showDialog4();
    } else if (type === "dialog5") {
      showDialog5();
    } else if (type === "dialog6") {
      showDialog6('successfuly added');
    } else if (type === "dialog7") {
      showDialog7();
    } else if (type === "dialog8") {
      showDialog8();
    } else if (type === "dialog9") {
      showDialog9();
    } else if (type === "dialog10") {
      showDialog10();
    }
  });
});

function showDialog1(title) {
  Swal.fire("Any fool can use a computer");
}

function showDialog2(title) {
  Swal.fire("The Internet?", "That thing is still around?", "question");
}

function showDialog3(title) {
  Swal.fire({
    icon: "error",
    title: `${title}`,
    text: "Something went wrong!",
    footer: "<a href>Why do I have this issue?</a>",
  });
}

function showDialog4(title) {
  Swal.fire({
    imageUrl: "https://placeholder.pics/svg/300x1500",
    imageHeight: 1500,
    imageAlt: "A tall image",
  });
}

function showDialog5(title) {
  Swal.fire({
    title: "<strong>HTML <u>example</u></strong>",
    icon: "info",
    html:
      "You can use <b>bold text</b>, " +
      '<a href="//sweetalert2.github.io">links</a> ' +
      "and other HTML tags",
    showCloseButton: true,
    showCancelButton: true,
    focusConfirm: false,
    confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
    confirmButtonAriaLabel: "Thumbs up, great!",
    cancelButtonText: '<i class="fa fa-thumbs-down"></i>',
    cancelButtonAriaLabel: "Thumbs down",
  });
}

function showDialog6(title) {
  Swal.fire({
    position: "bottom-end",
    icon: "success",
    title: `${title}`,
    showConfirmButton: false,
    timer: 3000,
  });
}

function showDialog7(title) {
  Swal.fire({
    title: `${title}`,
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.value) {
      Swal.fire("Deleted!", "Your file has been deleted.", "success");
    }
  });
}

function showDialog8(title) {
  Swal.fire({
    title:  `${title}`,
    text: "Modal with a custom image.",
    imageUrl: "https://unsplash.it/400/200",
    imageWidth: 400,
    imageHeight: 200,
    imageAlt: "Custom image",
  });
}

function showDialog9(title) {
  let timerInterval;
  Swal.fire({
    title:  `${title}`,
    html: "I will close in <b></b> milliseconds.",
    timer: 2000,
    timerProgressBar: true,
    onBeforeOpen: () => {
      Swal.showLoading();
      timerInterval = setInterval(() => {
        const content = Swal.getContent();
        if (content) {
          const b = content.querySelector("b");
          if (b) {
            b.textContent = Swal.getTimerLeft();
          }
        }
      }, 100);
    },
    onClose: () => {
      clearInterval(timerInterval);
    },
  }).then((result) => {
    /* Read more about handling dismissals below */
    if (result.dismiss === Swal.DismissReason.timer) {
      console.log("I was closed by the timer");
    }
  });
}

function showDialog10(title) {
  Swal.fire({
    title:  `${title}`,
    icon: "question",
    iconHtml: "ØŸ",
    confirmButtonText: "Ù†Ø¹Ù…",
    cancelButtonText: "Ù„Ø§",
    showCancelButton: true,
    showCloseButton: true,
  });
}