document.querySelectorAll(".clear-input").forEach((element) => {
    element.addEventListener(
        "click",
        (event) => {
            event.stopPropagation();
            element.nextElementSibling.value = "";
            element.form.submit();
        },
        { once: true },
    );
});
