const modal = () => {
    const btnOpen = document.querySelector('.js-open')
    console.log(btnOpen);

    const btnClose = document.querySelector(".js-close")
    console.log(btnClose);

    const modal = document.querySelector('.add')
    console.log(modal);

    const open = () => {
        modal.classList.add("active")
    }

    const close = () => {
        modal.classList.remove("active")
    }

    btnOpen.addEventListener("click", open)
    btnClose.addEventListener("click", close)

    document.addEventListener("keydown", (event, keyCode) => {
        if (event.keyCode === 27) {
            close()
        }
    })
}

const init = () => {
    modal()
}

document.addEventListener("DOMContentLoaded", init)