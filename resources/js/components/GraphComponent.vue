<template>
    <div class="graph__output" v-if="loaded">
        <h2 class="graph__output-header">1. Hypertension</h2>
        <p class="graph__output-text">Patientliste <span class="graph__output-dot">i</span></p>
        <BarChart :chartData="chartData" :chartOptions="chartConfig"></BarChart>
    </div>
</template>

<script>
import { useGraphStore } from '../stores/graphStore.js';
import BarChart from './shared/BarChart.vue';
import { ref, onMounted } from 'vue';

export default {
    components: {
        BarChart
    },
    setup() {
        const graphStore = useGraphStore();
        const graphData = ref([]);
        const chartData = ref({});
        const loaded = ref(false);

        onMounted(async () => {
            await graphStore.getData();
            graphData.value = graphStore.data;

            const { standard, praksis } = graphData.value.reduce((prevVal, curVal) => {
                const { praksis_vaerdi, standard_vaerdi } = curVal;

                return {
                    standard: [...prevVal.standard, standard_vaerdi],
                    praksis: [...prevVal.praksis, praksis_vaerdi]
                }
            }, { standard: [], praksis: [] });

            chartData.value = {
                labels: ['Målt BT x 1/år', 'Type 2, BT <= 140/90'],
                datasets: [
                    {
                        label: 'Standard',
                        data: standard,
                        backgroundColor: 'yellow',
                    },
                    {
                        label: 'Praksis',
                        data: praksis,
                        backgroundColor: 'cyan'
                    }
                ]
            }

            loaded.value = true;
        });

        const chartConfig = {
            responsive: true,
            scales: {
                y: {
                    suggestedMin: 50,
                    suggestedMax: 100,
                },
            }
        }

        return {
            loaded,
            chartData,
            chartConfig
        }
    }
}
</script>

<style lang="scss">
.graph {
    &__output {
        max-width: 800px;

        &-header {
            font-weight: 700;
            display: inline-block;
            margin-right: 5px;
        }

        &-text {
            display: inline-block;
        }

        &-dot {
            background: lightgray;
            border-radius: 50%;
            width: 20px;
            text-align: center;
            display: inline-flex;
            height: 20px;
            justify-content: center;
            align-items: center;
        }
    }
}
</style>