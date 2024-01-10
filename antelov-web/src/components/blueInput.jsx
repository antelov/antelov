const blueInput = ({ h, w, inputName ,type }) => {
  return (
    <div>
      <label
        for="first_name"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white p-2"
      >
        {inputName}
      </label>
      <input
        type={type}
        id="first_name"
        class="bg-[#EAF3FA80] border-l-[1px] text-gray-900 text-sm rounded-lg focus:[#2B478BD9]  border-[#2B478BD9] block w-full p-2.5 dark:bg-gray-700  dark:placeholder-gray-400 dark:text-white dark:focus:[#2B478BD9] focus:border-blue-gray-200"
        placeholder={inputName}
        style={{ height: `${h}px`, width: `${w}px` }}
        required
      />
    </div>
  );
};

export default blueInput;
