<div class="message">
    <div class="texts">
      <div class="text text-front">
        coming soon
      </div>
      <div class="text text-back">
        coming soon
      </div>
    </div>
  </div>

  <style>
      body {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  background-color: #000;
}
.message {
  display: flex;
  justify-content: center;
  perspective: 500;
  padding-top: 25vh;
}
.texts {
  position: relative;
  transform-style: preserve-3d;
  transition: transform 1s;
  color: #FFF;
  letter-spacing: 1px;
  text-transform: uppercase;
  font-size: 30vh;
  line-height: normal;
  cursor: wait;
  height: 50vh;
  width: 90%;
  outline: 10px;
  outline-style: double;
  text-align: center;
}
.texts:hover {
  transform: rotateY(180deg);
}
.text {
  position: absolute;
  top: 15%;
  left: 0;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
}

.text-front {
  z-index: 1;
}
.text-back {
  transform: rotateY(180deg);
}

@media screen and (max-width:995px){
  .texts{
    font-size: 25vh;
  }
} 
  </style>