/*
  Warnings:

  - You are about to drop the column `filename` on the `Page` table. All the data in the column will be lost.
  - Added the required column `content` to the `Page` table without a default value. This is not possible if the table is not empty.
  - Added the required column `path` to the `Page` table without a default value. This is not possible if the table is not empty.

*/
-- RedefineTables
PRAGMA foreign_keys=OFF;
CREATE TABLE "new_Page" (
    "id" INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    "title" TEXT NOT NULL,
    "path" TEXT NOT NULL,
    "content" TEXT NOT NULL,
    "categoryId" INTEGER NOT NULL,
    CONSTRAINT "Page_categoryId_fkey" FOREIGN KEY ("categoryId") REFERENCES "Category" ("id") ON DELETE RESTRICT ON UPDATE CASCADE
);
INSERT INTO "new_Page" ("categoryId", "id", "title") SELECT "categoryId", "id", "title" FROM "Page";
DROP TABLE "Page";
ALTER TABLE "new_Page" RENAME TO "Page";
PRAGMA foreign_key_check;
PRAGMA foreign_keys=ON;
