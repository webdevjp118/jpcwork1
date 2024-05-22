console.clear();

const wait = async ms => new Promise(done => setTimeout(done, ms));

const makeSlider = containerEl => {
  const els = containerEl.querySelectorAll('div');
  const lastIndex = els.length - 1;
  let currentIndex = 0,z = 0;

  return {
    next: async () => {
      // TODO: block if transition in progress

      const el = els[currentIndex];
      el.style.zIndex = ++z;
      console.log(z, currentIndex);
      el.classList.remove('visible');
      if (++currentIndex > lastIndex) currentIndex = 0;
      await wait(800);
      el.classList.add('visible');
    } };

};

const makeSequencer = (sliders, offsets) => ({
  next: () => {
    sliders.forEach((slider, idx) => {
      setTimeout(slider.next, offsets[idx]);
    });
  } });


const sequencer = makeSequencer(
Array.from(document.querySelectorAll('.img-slider')).map(makeSlider),
[0, 100, 300, 500]);


// document.querySelector('button').addEventListener('click', sequencer.next);

sequencer.next();
sequencer.next();
setInterval(() => {
  sequencer.next();
  sequencer.next();
}, 8000);