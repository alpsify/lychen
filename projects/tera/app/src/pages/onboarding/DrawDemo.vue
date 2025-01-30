<template>
  <form>
    <fieldset>
      <label for="checkbox">Draw Mode Enabled</label>
      <input
        id="checkbox"
        v-model="drawEnable"
        type="checkbox"
      />
    </fieldset>
    <fieldset>
      <label for="type">Geometry Type</label>
      <select
        id="type"
        v-model="drawType"
        class="select-default"
      >
        <option value="Point">Point</option>
        <option value="LineString">LineString</option>
        <option value="Polygon">Polygon</option>
        <option value="Circle">Circle</option>
      </select>
    </fieldset>
  </form>

  <Map.OlMap
    ref="map"
    :load-tiles-while-animating="true"
    :load-tiles-while-interacting="true"
    style="height: 400px"
  >
    <Map.OlView
      ref="view"
      :center="center"
      :zoom="zoom"
      :projection="projection"
    />

    <Layers.OlTileLayer>
      <Sources.OlSourceOsm />
    </Layers.OlTileLayer>

    <Map.OlGeolocation
      :projection="projection"
      @change:position="geoLocChange"
    >
    </Map.OlGeolocation>

    <Layers.OlVectorLayer>
      <Sources.OlSourceVector :projection="projection">
        <Interactions.OlInteractionDraw
          v-if="drawEnable"
          :type="drawType"
          @drawend="drawend"
          @drawstart="drawstart"
        >
          <Styles.OlStyle>
            <Styles.OlStyleStroke
              color="blue"
              :width="2"
            ></Styles.OlStyleStroke>
            <Styles.OlStyleFill color="rgba(255, 255, 0, 0.4)"></Styles.OlStyleFill>
            <Styles.OlStyleCircle :radius="5">
              <Styles.OlStyleFill color="#00dd11" />
              <Styles.OlStyleStroke
                color="blue"
                :width="2"
              />
            </Styles.OlStyleCircle>
          </Styles.OlStyle>
        </Interactions.OlInteractionDraw>
      </Sources.OlSourceVector>

      <Styles.OlStyle>
        <Styles.OlStyleStroke
          color="red"
          :width="2"
        ></Styles.OlStyleStroke>
        <Styles.OlStyleFill color="rgba(255,255,255,0.1)"></Styles.OlStyleFill>
        <Styles.OlStyleCircle :radius="7">
          <Styles.OlStyleFill color="red"></Styles.OlStyleFill>
        </Styles.OlStyleCircle>
      </Styles.OlStyle>
    </Layers.OlVectorLayer>
  </Map.OlMap>
</template>

<script lang="ts" setup>
import { ref, onBeforeMount } from 'vue';
import { Map, Layers, Sources, Interactions, Styles } from 'vue3-openlayers';
import type { View } from 'ol';
import type { ObjectEvent } from 'ol/Object';

const center = ref([40, 40]);
const projection = ref('EPSG:4326');
const zoom = ref(8);

const drawEnable = ref(true);
const drawType = ref('Polygon');

function drawstart(event) {
  //console.log(event);
}

function drawend(event) {
  //console.log(event);
}

const map = ref(null);
const view = ref<View>();
const position = ref([]);

function geoLocChange(event: ObjectEvent) {
  //console.log('AAAAA', event);
  position.value = event.target.getPosition();
  view.value?.setCenter(event.target?.getPosition());
}

function success(position) {
  //console.log(position.coords.latitude, position.coords.longitude);
}

function error() {
  alert('Sorry, no position available.');
}

const options = {
  enableHighAccuracy: true,
  maximumAge: 30000,
  timeout: 27000,
};

const watchID = navigator.geolocation.watchPosition(success, error, options);
</script>
