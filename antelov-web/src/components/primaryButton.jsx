import { useEffect } from "react";

const primaryButton = ({ text, w, h }) => {

  return (
    <button
      type="button"
      className={`text-white  bg-[#FE6F2E] hover:bg-[#E45616] focus:ring-4 focus:ring-[#FFD9C7] font-medium rounded-lg text-sm  me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800`}
      style={{ height: `${h}px`  , width: `${w}px`}}
    >
      {text}
    </button>
  );
};

export default primaryButton;
