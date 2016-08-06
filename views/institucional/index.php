

<h1>teste</h1>


<div id="clones">

    <h3>clone input</h3>
    Adicionar item  <button @click="addItem">+</button>

     <ul>
       <li v-for="clone in clones">
         <input type="text" name="{{clone.name}}" value="">

         <button v-on:click="relItem($index)">X</button>
       </li>
</div>
