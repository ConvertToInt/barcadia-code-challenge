new Vue({
  el: "#barcadia-app",
  data: {
    inputDate: "",
    convertedDate: "",
    errorMsg: "",
  },
  methods: {
    async convertDate() {
      try {
        const response = await fetch("api.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({ inputDate: this.inputDate }),
        });

        const data = await response.json();

        if (data.error) {
          console.log(data.error);
          this.convertedDate = "";
          this.errorMsg = data.error;
        } else {
          this.errorMsg = "";
          this.convertedDate = data.convertedDate;
        }
      } catch (error) {
        this.errorMsg = "An error occured while converting.";
        this.convertedDate = "";
      }
    },
  },
});
