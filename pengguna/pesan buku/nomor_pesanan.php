
<section class="d-flex flex-column align-items-center">
               <div class="col-lg-4 mb-5" style="margin-top: 100px;">
                  <div class="card">
                     <div class="card-body text-center">
                        <h5 class="card-title">NOMOR PESANAN ANDA</h5>

                        <border id="no" class="bg-info text-white py-2 px-4 rounded font-20"></border>
                        
                     </div>
                  </div>
               </div>
            </div>
          </section>


<script>
    let personName = sessionStorage.getItem("testing");
    let x = document.querySelector('#no')
    x.innerHTML = personName
</script>