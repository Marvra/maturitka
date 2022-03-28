<template>
  <div class="mt-4">
    <div
      class="imagePreviewWrapper border border-4"
      :style="{ 'background-image': `url(${previewImage})` }"
      @click="selectImage">
    </div>

     <input class="form-control form-control-sm invisible" id="formFileSm"
      ref="fileInput"
      type="file"
      @input="pickFile">
  
  </div>
</template>
 
<script>
export default {
  data() {
      return {
        previewImage: null
      };
    },
  methods: {
      selectImage () {
          this.$refs.fileInput.click()
      },
      pickFile () {
        let input = this.$refs.fileInput
        let file = input.files
        if (file && file[0]) {
          let reader = new FileReader
          reader.onload = e => {
            this.previewImage = e.target.result
          }
          reader.readAsDataURL(file[0])
          this.$emit('input', file[0])
        }
      }
  }
}
</script>
 
<style scoped lang="scss">
.imagePreviewWrapper {
    width: 250px;
    height: 200px;
    display: block;
    cursor: pointer;
    margin: 0 auto 30px;
    background-size: cover;
    background-position: center center;
    background-image: url("https://images2.alphacoders.com/100/1003880.png");
    // daj img na ktorom to budes davat (basic ulpoad image) 
}
</style>