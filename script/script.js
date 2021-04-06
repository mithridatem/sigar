       
        function createOneDangerToast(message){
            let toastDanger = "<div class='toast align-items-center bg-danger text-white' role='alert' aria-live='assertive' aria-atomic='true'><div class='toast-header'><img src='./css/img/adrar-favicon.png' class='rounded me-2' height='24px'><strong class='me-auto'>Error</strong><button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button></div><div class='toast-body'>" + message + "</div></div>"
            let toastContainer = document.querySelector(".toast-container")
            let divToast = document.querySelector(".toast-container")
            //toastContainer.innerHTML = toastDanger
            toastContainer.innerHTML = "toto"
        }

        function createOneSuccessToast(message){
            let toastDanger = "<div class='toast align-items-center bg-success text-white' role='alert' aria-live='assertive' aria-atomic='true'><div class='toast-header'><img src='./css/img/adrar-favicon.png' class='rounded me-2' height='24px'><strong class='me-auto'>Error</strong><button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button></div><div class='toast-body'>" + message + "</div></div>"
            let toastContainer = document.querySelector(".toast-container")
            toastContainer.innerHTML = toastDanger
        }
        
        function afficherToasts(){
            var toastElList = [].slice.call(document.querySelectorAll('.toast'))
            console.log(toastElList)
            toastElList.map((el) => {
                let toast = new bootstrap.Toast(el)
                toast.show()
            })
        }
        afficherToasts()

        
