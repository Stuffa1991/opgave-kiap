import { defineStore } from 'pinia'
import { get } from 'axios';

export const useGraphStore = defineStore('graph', {
  state: () => { data: [] },
  actions: {
    async getData() {
      const { data } = await get('/api/graph-api');
      this.data = data;
    }
  },
  getters: {
    graphData: (state) => state.data,
    graphDataById: (state) => {
      return (id) => state.data.find((g) => g.ydernummer === id);
    }
  }
})