import { type HTMLAttributes } from 'vue';

export interface DivWithBackgroundImageProps {
  is?: string;
  class?: HTMLAttributes['class'];
  overlayClass?: HTMLAttributes['class'];
  backgroundImage?: string;
  overlay?: boolean;
}
