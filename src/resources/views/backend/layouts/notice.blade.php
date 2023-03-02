@if (Session('success_sm'))
    <script>
        $(document).ready(function() {
            Toastify({
                text: "{{ Session('success_sm') }}",
                avatar: "{{ asset('frontend/assets/img/fav-se.png') }}",
                duration: 3000,
                destination: "",
                newWindow: true,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
                onClick: function() {} // Callback after click
            }).showToast();
        });
    </script>
@endif
@if (Session('success'))
    <script>
        $(document).ready(function() {


            Swal.fire({
                html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Well done !</h4><p class="text-muted mx-4 mb-0">{{ Session('success') }}</p></div></div>',

                cancelButtonClass: "btn btn-primary w-xs mb-1",
                cancelButtonText: "Back",
                timer: 2e3,
                didOpen: function() {
                    (t = setInterval(function() {
                        var t = Swal.getHtmlContainer();
                        !t ||
                            ((t = t.querySelector("b")) &&
                                (t.textContent = Swal.getTimerLeft()));
                    }, 100));
                },
                onClose: function() {
                    clearInterval(t);
                },
                timerProgressBar: true,
                buttonsStyling: false,
                showCancelButton: false,
                showConfirmButton: false,
                showCloseButton: false,
            });
        });
    </script>
@endif

@if (Session('error'))
    <script>
        $(document).ready(function() {
            Swal.fire({
                html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#e83a30,secondary:#e83a30" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>{{ Session('error') }}</h4><p class="text-muted mx-4 mb-0">Opps...!</p></div></div>',

                cancelButtonClass: "btn btn-primary",
                cancelButtonText: "Back",
                timerProgressBar: true,
                buttonsStyling: false,
                showCancelButton: true,
                showConfirmButton: false,
                showCloseButton: false,
            });
        });
    </script>
@endif
