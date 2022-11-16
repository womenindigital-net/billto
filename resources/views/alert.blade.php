helo
<style>
    .colored-toast {
    background-color: #ffffff !important;
  }
  .colored-toast  {
    color: rgb(85, 187, 88);
    font-size: 16px;
  }
  </style>
  @php
      $alert = "Massage successfuly sent";
  @endphp
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>
<script>
    const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    customClass: {
        popup: 'colored-toast'
    },
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
    })
    Toast.fire({
    icon: 'success',
    title: '{{ $alert  }}',
  })
  </script>
