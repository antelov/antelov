const blueInput = ({ h, w, inputName ,type }) => {
  return (
    <div className="p-3">
      <label
        for="first_name"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white p-2"
      >
        {inputName}
      </label>
      <input
        type={type}
        id="first_name"
        class="bg-[#EAF3FA80] border-l-[1px] text-gray-900 text-sm rounded-lg   border-[#2B478BD9] block w-full p-2.5  "
        placeholder={inputName}
        style={{ height: `${h}px`, width: `${w}px` }}
        required
      />
    </div>
  );
};

export default blueInput;
