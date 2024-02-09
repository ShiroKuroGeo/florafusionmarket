// Assets->services (create js name index product.js) -> 

var data = new FormData();
data.append("method", "displayallprod");
axios.post('/florafusionmarket/includes/router.php', data)
.then(function(r){
    var data = r.data;
    var parent = document.querySelector('#section2');
    // data = data.slice(0,3);
    
    data.forEach(product => {
      var child = document.createElement('div');
      child.className = 'mx-auto px-4';
      child.innerHTML = `
        <div class="max-w-5xl mx-auto p-4">
          <div class="gap-4">
            <div class=" w-64 m-2">
              <div class="bg-white shadow rounded-lg p-4">
                <img data-bs-toggle="modal"  data-id =" ${product.product_ID}" data-bs-target="#View" src="/FloraFusionMarket/assets/img/${product.product_image}" alt="plant" class="w-full h-36 object-cover cursor-pointer">
                <div class="p-3 text-center"> 
                  <h3 class="text-lg font-semibold mb-2">${product.product_name}</h3>
                  <p class="text-gray-600">${product.product_des}</p>
                  <div class="mt-2">
                    <span class="text-blue-500 font-semibold">${product.product_price}</span>
                  </div>
                  <div class="mt-3 flex justify-center">
                    <button class="text-gray-500 hover:text-red-500">
                      <i class="fas fa-heart"></i>
                    </button>
                    <button class="text-gray-500 hover:text-green-600 ml-2" onclick="addToCart(${product.product_ID})">
                      <i class="fas fa-cart-plus"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>`;
    
      parent.appendChild(child);
    });    
});

var data = new FormData();
data.append("method","displayReview");
axios.post('/FloraFusionMarket/includes/router.php', data)
.then(function(r){
  var data = r.data;
  var parent = document.querySelector('#section3');

  data.forEach(review => {
    var child = document.createElement('div');
    child.className = 'mx-auto px-4';
    child.innerHTML = `
    <div class="max-w-5xl mx-auto p-4">
      <div class="gap-4">
        <div class=" w-64 m-2">
        <div class="bg-white shadow rounded-lg p-4">
          <h3 class="text-xl font-semibold mb-2">${review.fullname}</h3>
          <div class="flex items-center mb-2">
            <div class="ml-1 text-gray-700">${review.rating} stars</div>
          </div>
          <p class="text-gray-700 mb-4">${review.review_text}</p>
        </div>
      </div>`;
      parent.appendChild(child);
  });
});



$(document).on('click','.cursor-pointer',function(){
  var id = $(this).data('id');
  var data = new FormData();
  data.append("method", "displayIndip");
  data.append('id',id);
  axios.post('/FloraFusionMarket/includes/router.php', data)
  .then(function(r){
      var data = r.data;
      console.log(data);

      data.forEach((view)=>{
        var image = document.getElementById('image');
        image.src ='/FloraFusionMarket/assets/img/' + view.product_image;

       var indiname = document.getElementById('indi-name');
       indiname.textContent = view.product_name;

       var indiprice = document.getElementById('indi-price');
       indiprice.textContent = view.product_price;


       var indidesc = document.getElementById('indi-desc');
       indidesc.textContent = view.product_des;


      })
  });

});