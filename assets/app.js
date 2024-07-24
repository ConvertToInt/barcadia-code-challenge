new Vue({
  el: "#barcadia-app",
  data: {
    inputValue: "",
    convertedValue: "",
    errorMsg: "",
  },
  methods: {
    async convertValue() {
      try {
        const response = await fetch("api.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({ inputValue: this.inputValue }),
        });

        const data = await response.json();

        if (data.error) {
          console.log(data.error);
          this.convertedValue = "";
          this.errorMsg = data.error;
        } else {
          this.errorMsg = "";
          this.convertedValue = data.convertedValue;
        }
      } catch (error) {
        this.errorMsg = "An error occured while converting.";
        this.convertedValue = "";
      }
    },
  },
});
