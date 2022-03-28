<template>
  <div>
    <textarea v-model="text" :id="id" class="border" rows="8" type="text"  name="description" style="width: 800px"   placeholder="Popis svoj produkt..." ></textarea>
    <p v-if="! isOver()" class="text-muted fst-italic">Zostava {{charactersRemaining}} symbolov na pouzitie.</p>
    <p v-else class="over text-danger">Ste cez limit o {{ charactersOver }} symbolov.</p>
  </div>
</template>

<script>
  module.exports = {
    props: {
      id: {
        type: String,
        required: true
      },
      label: {
        type: String,
        required: true
      }
    },
    data: function() {
      return {
        text: '',
        maxCharacters: 1000,
      }
    },
    computed: {
      charactersRemaining: function () {
        return this.maxCharacters - this.text.length;
      },
      charactersOver: function () {
        return this.isOver() ? this.text.length - this.maxCharacters : 0;
      }
    },
    methods: {
      isOver: function () {
       return this.charactersRemaining < 0; 
      }
    }
  }
</script>