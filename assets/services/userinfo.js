const { createApp } = Vue;
createApp({
  data() {
    return {
            carts:[],
            allcarts: 0,
            wishlist: [],
            wishlistLength:0,
    };
  },
  methods: {
    dipslayWishlist: function() {
      const vue = this;
      var data = new FormData();
      data.append("method", "dipslayWishlist"); 
      axios.post('/florafusionmarket_v4/includes/router.php', data)
          .then(function(r) {
              vue.wishlist = [];
              for (var v of r.data) {
                  vue.wishlist.push({
                      product_name: v.product_name,
                      product_price: v.product_price,
                      product_image: v.product_image,
                      id: v.wishlist_id,
                  });
              }
              vue.wishlistLength = r.data.length;
              return vue.wishlistLength;
          });
      },
      displayCart: function () {
          const vue = this;
          var data = new FormData();
          data.append("method", "DisplayCart");
          axios.post('/florafusionmarket_v4/includes/router.php', data)
              .then(function (r) {
                  vue.carts = [];
                  vue.allcarts = r.data.length;
                  for (var v of r.data) {
                      vue.qrCoding = v.qr_image;
                      vue.usid = v.userID;
                      vue.ids.push(v.cart_id);
                      vue.carts.push({
                          p_name: v.product_name,
                          p_price: v.product_price,
                          p_quantity: v.quantity,
                          p_totalPrice: v.totalPrice,
                          id: v.cart_id,
                          stats: v.status
                      });
                  }
                  vue.cartlistLength = r.data.length;
                  vue.calculateTotalPrice(); // Move this line up to be executed
                  return vue.cartlistLength;
              });
      }, 
    CSInfo: function () {
      var data = new FormData();
      data.append("method", "addUserInfo");
      data.append("file", document.getElementById('file').files[0]);
      data.append("name", document.getElementById('name').value);
      data.append("email", document.getElementById('email').value);
      data.append("current_add", document.getElementById('current_add').value);
      data.append("permanent_add", document.getElementById('permanent_add').value);
      data.append("contact_no", document.getElementById('contact_no').value);
      data.append("gender", document.getElementById('gender').value);
      data.append("birthday", document.getElementById('birthday').value);

      axios.post('../includes/router.php', data)
        .then(function (r) {
          // Simple browser alert for success
          alert('Successfully updated');
          window.location.reload(); // Reload the page

        })
        .catch(function (error) {
          // Simple browser alert for error
          alert('An error occurred while processing your request.');
        });
    }
  },
  created:function(){
    this.dipslayWishlist();
    this.displayCart();
}
}).mount('#userinfo');
