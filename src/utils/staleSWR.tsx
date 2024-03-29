import useSWR from 'swr';
const fetcher = (url: RequestInfo | URL) => fetch(url).then((res) => res.json());

const useStaleSWR = (dataKey: any, overrideRevalidation = {}) => {
  const revalidationOptions = {
    revalidateIfStale: false,
    revalidateOnFocus: false,
    revalidateOnReconnect: false,
    ...overrideRevalidation,
  };

  return useSWR(dataKey, fetcher, revalidationOptions);
};

export default useStaleSWR;
