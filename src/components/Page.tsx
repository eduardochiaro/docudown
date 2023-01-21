import React, { useEffect, useState } from 'react';
import Markdoc from '@markdoc/markdoc';
import useStaleSWR from '../utils/staleSWR';
import styles from '../styles/Page.module.scss'

const Page = ({ category, page }: { category: string | string[] | undefined; page: string | string[] | undefined }) => {
  const [htmlContent, setHtmlContent] = useState('');
  const { data } = useStaleSWR(`/api/pages/${page}`);

  useEffect(() => {
    if (data && data.content) { 
      const est = Markdoc.parse(data?.content);
      const content = Markdoc.transform(est);
      const html = Markdoc.renderers.html(content);
      setHtmlContent(html);
    }
  }, [data])

  return (
    <div className="grow max-w-xl mx-auto">
      {data &&
      <div className={`${styles['page']}`} dangerouslySetInnerHTML={{__html: htmlContent}}></div>
      }
    </div>
  );
}

export default Page;