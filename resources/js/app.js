require('./bootstrap');

require('alpinejs');


import Swal from "sweetalert2";



window.delConfirm = function(formId){
    Swal.fire({
        title: ' Etes vous sur de vouloir supprimer ce produit?',
        text: " si vous le supprimer vous ne serez plus a mesure de le recuperer.!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui,  supprimer!',
        cancelButtonText : 'Annuler'
      }).then((result) => {
        if (result.isConfirmed) {
         
         document.getElementById(formId).submit();
        }
      })

}