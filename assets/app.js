new Vue({
  el: "#barcadia-app",
  data: {
    inputValue: "",
    convertedValue: "",
  },
  methods: {
    async convertValue() {
      const response = await fetch("api.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ inputValue: this.inputValue }),
      });

      const data = await response.json();
      this.convertedValue = data.convertedValue;
    },
  },
});
