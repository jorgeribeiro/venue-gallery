<template>
  <div>
    <nav class="navbar">
      <form class="searchbar">
        <input v-model="venue_name" type="text" placeholder="Name" class="searchbar-input">
        <input v-model="discount" type="text" placeholder="Discount percentage" class="searchbar-input">
        <button type="submit" @click.prevent="searchVenues" class="btn btn--green btn--go">Search</button>
      </form>
    </nav>
    <ul class="image-card-grid">
      <ImageCard v-for="venue in venues" :key="venue.id" :venue="venue" />
    </ul>
  </div>
</template>

<script>
import axios from 'axios';

import ImageCard from '@/components/ImageCard';

export default {
  name: 'home',
  components: {
    ImageCard
  },

  data() {
    return {
      venue_name: '',
      discount: '',
      venues: [],
    };
  },

  methods: {
    searchVenues() {
      axios
        .get('http://localhost:8000/api/venues', {
          params: {
            name: this.venue_name,
            discount: this.discount
          }
        })
        .then(response => (this.venues = response.data));
    },
  },

  mounted() {
    this.searchVenues();
  },
};
</script>

<style lang="scss">
.screen-reader-only {
  height: 1px;
  width: 1px;
  position: absolute;
  left: -100000px;
}
.text-centered {
  text-align: center;
}
.wrapper {
  margin: 0 auto;
  max-width: 800px;
  @media only screen and (max-width: 799px) {
    max-width: 100%;
    margin: 0 1.5rem;
  }
}
.image-card-grid {
  list-style: none;
  margin: .5rem 0;
  padding: 0;
  display: flex;
  align-items: flex-start;
  flex-wrap: wrap;
}
.navbar {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 1rem;
}
.searchbar {
  width: 300px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 10px;
  @media only screen and (max-width: 549px) {
    width: 100%;
    label {
      width: 80%;
    }
  }
}
.searchbar-input {
  padding: .5rem 1rem;
  border-radius: 20px;
  font-size: 1rem;
  border: 1px solid gray;
  min-width: 170px;
  margin-right: 0.5rem;
  @media only screen and (max-width: 549px) {
    min-width: 0;
    width: 100%;
  }
}
.btn {
  padding: .5rem 1rem;
  font-size: 1rem;
  border-radius: 20px;
  background: transparent;
  border: none;
}
.btn--green {
  background: #42b983;
  color: white;
  font-weight: bold;
}
.btn--go {
  padding: .5rem 2rem;
  margin-left: 0.5rem;
}
</style>