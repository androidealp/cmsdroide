$(document).on('click','[data-clone]',function(e){
  e.preventDefault();
});

// normal = new Vue({
//   el: '#app',
//   data: {
//     mensagem: 'nova mensagem inserida via VUE',
//   }
// });

 new Vue({
  el: '#clones',
  data:{
    clones:[]
  },
  methods: {
    addItem: function () {

      this.clones.push({ 'name':'inputText[]'});

    },
    relItem: function (index) {
      this.clones.splice(index, 1)
    }
  }

});
