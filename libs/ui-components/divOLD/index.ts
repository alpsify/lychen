import { type HTMLAttributes } from 'vue';

export interface DivWithBackgroundImgProps {
  is?: string;
  class?: HTMLAttributes['class'];
  overlayClass?: HTMLAttributes['class'];
  backgroundImage?: string;
  overlay?: boolean;
}
